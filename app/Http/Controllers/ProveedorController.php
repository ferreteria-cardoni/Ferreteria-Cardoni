<?php

namespace App\Http\Controllers;

use App\proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\FormProveedores;

class ProveedorController extends Controller
{



    function __construct()
    {
        $this->middleware('compras')->only(['create', 'index', 'edit']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = proveedor::paginate(10);

        return view('proveedores.vistaProveedores', compact('proveedores'));
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
    public function store(FormProveedores $request)
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
        $proveedor = proveedor::findOrFail($id);

        return view('proveedores.modiProveedores', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormProveedores $request, $id)
    {
        $proveedor = proveedor::findOrFail($id);

        $proveedor->nombre = $request->idnombreProve;
        $proveedor->telefono = $request->idtelefonoProve;
        $proveedor->correo = $request->idcorreoProve;

        $proveedor->update();

        return redirect('Proveedores')->with('datos', 'Datos actualizados correctamente');
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
