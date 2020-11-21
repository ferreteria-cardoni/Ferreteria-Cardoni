<?php

namespace App\Http\Controllers;

use App\historialproducto;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BuscadorProducto;
use App\Http\Requests\FormProductoIngresar;
use App\Http\Requests\FormProductoModificar;
use Illuminate\Http\Request;
use App\producto;
use App\proveedor;
use App\marca_producto;
use App\marca;
use App\User;
use Exception;
use SebastianBergmann\Environment\Console;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('bodega')->only(['edit', 'create']);

        $this->middleware('pdf2')->only(['index']);

    }




    public function index(BuscadorProducto $request)
    {
       /* $query = trim($request->get('buscador'));
        $productos = producto::where('cod_producto','LIKE','%'.$query.'%')
                            ->orWhere('nombre','LIKE','%'.$query.'%')
                            ->paginate(10);
        if($query){
             $tabla = 'true';
            return view('productos.vistaproducto', compact('productos','tabla'));
        }else{
             $tabla = 'false';
            return view('productos.vistaproducto', compact('productos','tabla'));
        }*/

        // dd(Auth::user()->tieneRol()->first());

        return view('productos.vistaproducto');

    }
    // public function modification(BuscadorProducto $request){
    //     $proveedor = proveedor::all();
    //     $marca = marca::all();
    //     return view('productos.modiProductos', compact('proveedor','marca'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


         $proveedor = proveedor::all();
         $marca = marca::all();

         return view('productos.crearProductos', compact('proveedor','marca'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormProductoIngresar $request)
    {

        $findProductos = producto::find($request->idproducto);

        // $nombreProducto = producto::where('nombre', 'LIKE', '%'.$request->idnombre.'%')->first();

        $nombreProducto = producto::where('nombre', $request->idnombre)->first();

        // dd($nombreProducto);

        if ($findProductos && $nombreProducto) {
            return redirect('Productos/create')->with('datos','El código y nombre del producto que ingresó ya existe');

        }elseif ($findProductos){
            return redirect('Productos/create')->with('datos','El código de producto que ingresó ya existe');

        }elseif ($nombreProducto) {
            return redirect('Productos/create')->with('datos','El nombre del producto que ingresó ya existe');
        }else{


        //Registro de la tabla de productos
        $Productos = new producto;
        $Productos->cod_producto = strtoupper($request->idproducto);
        $Productos->cod_proveedor_fk= $request->idproveedor;
        $Productos->nombre =  $request->idnombre;
        $Productos->cantidad = 0;
        $Productos->descripcion = $request->iddescripcion;
        $Productos->presentacion = $request->idpresentacion;
        $Productos->save();

        //Registro en la tabla "marca_productos" de cod_marca_fk y cod_producto_fk.

               foreach ($request->idmarca as $key) {
                      $Marca = new marca_producto();
                      $Marca->cod_marca_fk = $key;
                      $Marca->cod_producto_fk = $request->idproducto;
                      $Marca->save();
                    }
        }


        //Mostrar vista
        return redirect('/Productos')->with('datos','Registro Exitoso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $proveedores = proveedor::all();
        $marcas = marca::all();
        $producto = producto::find($id);

        // dd($producto);

        return view('productos.modiProductos', compact('proveedores','marcas','producto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormProductoModificar $request, $id)
    {

//producto
            $findProductos = producto::find($id);
            $findProductos->cod_proveedor_fk = $request->idproveedor;
            $findProductos->nombre =  $request->idnombre;
            $findProductos->descripcion = $request->iddescripcion;
            $findProductos->presentacion = $request->idpresentacion;
            $findProductos->save();
//marcaproduto
            foreach ($request->idmarca as $key) {
                $Marca = new marca_producto();
                $Marca->cod_marca_fk = $key;
                $Marca->cod_producto_fk = $id;
                $Marca->save();
            }
//bitacora
            $bitacora= new historialproducto();
            $bitacora->operacion="Modifiacion";
            $bitacora->cod_empleado_fk=Auth::user()->cod_empleado_fk;
            $bitacora->cod_producto_fk=$id;
            $bitacora->save();

            return redirect('/Productos')->with('datos','Datos actualizados exitosamente');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  
    }

    public function buscador(Request $request){

        if($request->ajax()){

            $query = trim($request->get('query'));
            if($query != ''){
                $productos = producto::where('cod_producto','LIKE','%'.$query.'%')
                            ->orWhere('nombre','LIKE','%'.$query.'%')
                            ->take(10)
                            ->get();
            }else{
                $output='
                <tr>
                    <td align="center" colspan="5">Ingrese el nombre o codigo de producto que desea ver </td>
                </tr>
                ';
            }
            if(isset($productos)){
                $total=$productos->count();
                $output='';

                if($total>0)
                {
                    foreach($productos as $ItemP){
                    $redireccion = route('Productos.edit', $ItemP->cod_producto);
                    $output .='
                    <tr>
                        <th scope="row">'.$ItemP->cod_producto.'</th>
                        <td>'.$ItemP->nombre.'</td>

                        <td>'.$ItemP->cantidad.'</td>
                        // Quite el tr de aqui para concatenarlo despues y asi no aparezca abajo el boton de editar

                    ';

                    // Comprobando el rol del usuario que esta usando el sistema
                    if (Auth::user()->tieneRol()->first() == "bodega") {
                        // Agregando el boton junto con el tr al final
                        $output .= '<td><a href="'.$redireccion.'"><button type="button" class="btn btn-success">Editar</button></a></td></tr>';
                    }else{
                        // Agregando el tr sin el boton
                        $output .= '<tr>';
                    }

                    }

                }else{
                    $output='
                    <tr>
                        <td align="center" colspan="5">Sin Registros</td>
                    </tr>
                    ';
                }

            }

          /*   $productos= array(
                'table_data'  => $output
            ); */

            echo json_encode($output);
        }




    }

}
