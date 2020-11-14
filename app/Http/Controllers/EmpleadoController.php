<?php

namespace App\Http\Controllers;

use App\empleado;
use Illuminate\Http\Request;
use App\Http\Requests\FormEmpleados;
use App\role;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $roles = role::all();

        return view('empleados.crearEmpleados', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormEmpleados $request)
    {

        $utlimoEmpleado = empleado::orderBy('created_at', 'desc')->first();

        if ($utlimoEmpleado) {

            $codUtlimoEmpleado = substr($utlimoEmpleado->cod_empleado, 2);

            $contador = $codUtlimoEmpleado + 1;

        }else{
            $contador = 1;
        }


        $nombrePrimeraLetra = $request->NombreEmpleado[0];

        $apellidoPrimeraLetra = $request->ApellidoEmpleado[0];


        $codigoNuevoEmpleado = $nombrePrimeraLetra . $apellidoPrimeraLetra . $contador;

        $nuevoEmpleado = new empleado();
        
        $correo = $request->idcorreoE;
        $codRol = $request->idrol;

        $nuevoEmpleado->cod_empleado = $codigoNuevoEmpleado;
        $nuevoEmpleado->nombre = $request->NombreEmpleado;
        $nuevoEmpleado->apellido = $request->ApellidoEmpleado;
        $nuevoEmpleado->dui = $request->DUIE;
        $nuevoEmpleado->telefono = $request->idtelefonoE;
        $nuevoEmpleado->edad = $request->idEdadE;
        $nuevoEmpleado->sexo = $request->sexoE;

        $nuevoEmpleado->save();

        return redirect(route('Empleados.create'))->with('datos', 'Empleado registrado correctamente');

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
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
      
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
