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

        // dd($request->idproveedor);

        $compras->cod_proveedor_fk = $request->idproveedor;
        $compras->descripcion = $request->iddescripcion;
        $compras->save();

        // Recuperando el codigo de la ultima compra
        $codUltimaCompra = compra::orderBy('cod_compra', 'desc')->first()->cod_compra;

        //   Arreglo de codigos de productos
        $productos = $request->nombreproducto;
        // Arreglo de cantidades de productos
        $cantidades = $request->idcantidad;

        $i = 0;

        while ($i < sizeof($productos) ) {
            
            $pedidoCompra = new pedidocompra;

            

            $pedidoCompra->cod_compra_fk = $codUltimaCompra;
            // dd(producto::where('nombre', $productos[$i])->first()->cod_producto);
            $pedidoCompra->cod_producto_fk = producto::where('nombre', $productos[$i])->first()->cod_producto;
            $pedidoCompra->cantidad = $cantidades[$i];
            $pedidoCompra->save();
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
}
