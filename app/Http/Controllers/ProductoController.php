<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuscadorProducto;
use App\Http\Requests\FormProductoIngresar;
use Illuminate\Http\Request;
use App\producto;
use App\proveedor;
use App\marca_producto;
use App\marca;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(BuscadorProducto $request)
    {
     /*    $query = trim($request->get('buscador'));
        $productos = producto::where('cod_producto','LIKE','%'.$query.'%')
                            ->orWhere('nombre','LIKE','%'.$query.'%')
                            ->paginate(10);
        if($query){
             $tabla = 'true';
            return view('productos.vistaproducto', compact('productos','tabla'));
        }else{
             $tabla = 'false';
            return view('productos.vistaproducto', compact('productos','tabla'));
        } */
        return view('productos.vistaproducto');
    }
    

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

        if ($findProductos) {
            return redirect()->route('Productos.create')->with('datos','El producto que ingreso ya esta registrado');
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
        return redirect()->route('Productos.index')->with('datos','Registro Exitoso');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
                    $output .='
                    <tr>
                        <th scope="row">'.$ItemP->cod_producto.'</th>
                        <td>'.$ItemP->nombre.'</td>
                        <td>'.$ItemP->cantidad.'</td>
                    </tr>
                    ';
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