<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCrearCompras;
use App\pedidocompra;
use Illuminate\Http\Request;
use App\compra;
use App\producto;
use App\proveedor;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{


    public function productosProveedor($id)
    {
        return producto::where('cod_proveedor_fk', $id)->get();
    }


    public function __construct()
    {
        $this->middleware('bodega')->only(['index']);
        $this->middleware('compras')->only(['create']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidoCompra = pedidocompra::paginate(10);

        return view('compras.vistaCompras', compact('pedidoCompra'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = proveedor::all();
        // $producto = producto::all();
            
        return view('compras.crearCompras', compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormCrearCompras $request)
    {
        $codEmpleado = Auth::user()->id;
        
        $compras = new compra;

        $compras->cod_empleado_fk = $codEmpleado;
        $compras->cod_proveedor_fk = $request->idproveedor;
        $compras->descripcion = $request->iddescripcion;
        $compras->total = substr($request->totalc,1);
        $compras->save();
        // Recuperando el codigo de la ultima compra
        $codUltimaCompra = compra::orderBy('cod_compra', 'desc')->first()->cod_compra;
        // Arreglo de codigos de productos
        $productos = $request->nombreproducto;
        // Arreglo de cantidades de productos
        $cantidades = $request->idcantidad;
        //arreglo precio
        $precio=$request->idprecioC;

        $i = 0;

        while ($i < sizeof($productos) ) {
            
            $pedidoCompra = new pedidocompra;           
            $pedidoCompra->cod_compra_fk = $codUltimaCompra;
            
            // dd(producto::where('nombre', $productos[$i])->first()->cod_producto);
            $pedidoCompra->cod_producto_fk = producto::where('nombre', $productos[$i])->first()->cod_producto;
            $pedidoCompra->cantidad = $cantidades[$i];
            $pedidoCompra->save();

            $cant=producto::where('nombre', $productos[$i])->first()->cantidad;
            $cant=$cant+$cantidades[$i];
            $pro=producto::find(producto::where('nombre', $productos[$i])->first()->cod_producto);
            $pro->precioCompra=$precio[$i];
            $pro->cantidad=$cant;
            $pro->save();

            $i++;
        }
        return redirect(route('compras.create'))->with('datos','Registro exitoso');
        
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
                        $pedidoCompra= pedidocompra::where('cod_producto_fk',$ItemP->cod_producto)
                                                    ->get();
/*                         $output .='
                        <tr>
                            <th scope="row">'.$ItemP->cod_producto.'</th>
                            <td>'.$ItemP->nombre.'</td>
                        '; */
                        foreach($pedidoCompra as $hcompra){
                            $output .='
                            <tr>
                            <th scope="row">'.$ItemP->cod_producto.'</th>
                            <td>'.$ItemP->nombre.'</td>
                            <td>'.$hcompra->cantidad.'</td>
                            <td>'.\Carbon\Carbon::parse($hcompra->created_at)->format('d/m/Y').'</td>
                        ';
                        }
                        $output .= '<tr>';
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
