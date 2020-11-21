<?php

namespace App\Http\Controllers;


use App\cliente;
use App\historialcliente;
use Illuminate\Http\Request;
use App\Http\Requests\FormClientes;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{


    public function __construct()
    {
        $this->middleware('secretaria')->only(['create', 'index', 'edit']);
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = cliente::paginate(10);



        return view('Clientes.vistaClientes', compact('clientes'));

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
        $cliente = cliente::findOrFail($id);


        return view('Clientes.modiClientes', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormClientes $request, $id)
    {
        $searchClient = cliente::findOrFail($id);
    //    $searchClient->cod_cliente = $codCliente;
        $searchClient->nombre = $request->idnombreC;
        $searchClient->apellido = $request->idapellidoC;
        $searchClient->direccion = $request->DireccionC;
        $searchClient->telefono = $request->idtelefonoC;
        $searchClient->rubro = $request->idrubro;
        $searchClient->nit = $request->NIT;
        $searchClient->num_consumidor = $request->NCF;
        $searchClient->save();

        

        $bitacora= new historialcliente();
        $bitacora->operacion="Modificar";
        $bitacora->cod_empleado_fk=Auth::user()->cod_empleado_fk;
        $bitacora->cod_cliente_fk=$id;
        $bitacora->save();

        return redirect(route('Clientes.index'))->with('datos','Registro actualizado exitosamente');
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
