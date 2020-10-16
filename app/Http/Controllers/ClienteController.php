<?php

namespace App\Http\Controllers;


use App\cliente;
use Illuminate\Http\Request;
use App\Http\Requests\FormClientes;



class ClienteController extends Controller
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
        return view('Clientes.crearClientes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormClientes $request)
    {
        $cliente = new cliente;
        $ultimoCliente = cliente::orderBy('cod_cliente', 'desc')->first();

        if ($ultimoCliente) {
            $contador = $ultimoCliente->cod_cliente + 1;
        }else{
            $contador = 1;
        }

        // Generando codigo del cliente
        $codCliente = str_pad($contador, 4, '0', STR_PAD_LEFT);

        // Registrando cliente
        $cliente->cod_cliente = $codCliente;
        $cliente->nombre = $request->idnombreC;
        $cliente->apellido = $request->idapellidoC;
        $cliente->direccion = $request->DireccionC;
        $cliente->telefono = $request->idtelefonoC;
        $cliente->rubro = $request->idrubro;
        $cliente->nit = $request->NIT;
        $cliente->num_consumidor = $request->NCF;
        $cliente->save();

        return redirect(route('Clientes.create'))->with('datos','Registro exitoso');
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
