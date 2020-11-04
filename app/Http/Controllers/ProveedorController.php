<?php

namespace App\Http\Controllers;

use App\proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.crearProveedores');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $existeProveedor = proveedor::where('nombre', $request->idnombreProve)->first();


        if ($existeProveedor) {
            
            return redirect('/Proveedores/create')->with('datosError', 'El proveedor que ingresó ya existe.');
        
        }else{
            $proveedor = new proveedor();
            $proveedor->nombre = $request->idnombreProve;
            $proveedor->telefono = $request->idtelefonoProve;
            $proveedor->correo = $request->idcorreoProve;
            $proveedor->save();

            return redirect('/Proveedores/create')->with('datos', 'Proveedor registrado correctamente.');
        }


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
