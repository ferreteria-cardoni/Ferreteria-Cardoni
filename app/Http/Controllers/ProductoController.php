<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        
        return view('Productos.vistaproducto');
       
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
        //Registro de la tabla de productos
        $Productos = new producto;
        $Productos->cod_producto = $request->idproducto;
        $Productos->cod_proveedor_fk=$request->idproveedor;
        $Productos->nombre = $request->idnombre;
        $Productos->marca = $request->idmarca;
        $Productos->cantidad = $request->idcantidad;
        $Productos->precio = $request->idprecio;
        $Productos->descripcion = $request->iddescripcion;
        $Productos->presentacion = $request->idpresentacion;
        $Productos->save();

        //Obetencion del codigo del ultimo producto registrado
        $Productos = producto::where('precio','>',1)->orderBy('created_at','desc')->take(1)->first();

        //Obtencion del codigo de la marca correspondiente al producto anterior.
        $Marcas = marca::where('nombre_marca', $Productos->marca)->orderBy('created_at','desc')->take(1)->first();

        //Registro en la tabla "marca_productos" de cod_marca_fk y cod_producto_fk.
        $Marca = new marca_producto();
        $Marca->cod_producto_fk = $Productos->cod_producto;
        $Marca->cod_marca_fk = $Marcas->cod_marca;
        $Marca->save();

        //Mostrar vista
        return redirect()->route('login')->with('datos','Registro Exitoso');
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
