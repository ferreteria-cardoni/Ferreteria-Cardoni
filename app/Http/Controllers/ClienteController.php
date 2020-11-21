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

        $verificarNit = cliente::where('nit', $request->NIT)->first();

        $verificarNumeroConsumidor = cliente::where('num_consumidor', $request->NCF)->first();

        if ($verificarNit && $verificarNumeroConsumidor) {
            
            return redirect(route('Clientes.create'))->with('datosE', 'El NIT y el número de consumidor ya están registrados. Por favor, intente de nuevo.');
        }
        elseif ($verificarNit) {
            
            return redirect(route('Clientes.create'))->with('datosE', 'El NIT ya existe. Por favor, intente de nuevo.');
            
        }
        elseif ($verificarNumeroConsumidor) {
            return redirect(route('Clientes.create'))->with('datosE', 'El número de consumidor final ya existe. Por favor, intente de nuevo.');
            
        }else{
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

        $verificarNit = cliente::where('nit', $request->NIT)->first();

        // dd($verificarNit);

        $verificarNumeroConsumidor = cliente::where('num_consumidor', $request->NCF)->first();

        $searchClient = cliente::findOrFail($id);


        
        if ($verificarNit && $verificarNumeroConsumidor && $verificarNit->nit != $searchClient->nit && $verificarNumeroConsumidor->num_consumidor != $searchClient->num_consumidor) {
            
            return redirect(route('Clientes.edit', $id))->with('datosE', 'El NIT y el número de consumidor final que introdujo ya están registrados. Por favor, intente de nuevo.');
        }
        
        elseif ($verificarNit && $verificarNit->nit != $searchClient->nit) {
            return redirect(route('Clientes.edit', $id))->with('datosE', 'El NIT que introdujo ya se encuentra registrado. Por favor, intente de nuevo.');
        }

        elseif ($verificarNumeroConsumidor && $verificarNumeroConsumidor->num_consumidor != $searchClient->num_consumidor) {
            return redirect(route('Clientes.edit', $id))->with('datosE', 'El número de consumidor que introdujo final ya se encuentra registrado. Por favor, intente de nuevo.');
        }
        
        else{

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

    public function buscadorClientes(Request $request){

        if($request->ajax()){

            $query = trim($request->get('query'));
            if($query != ''){
                $Clientes= cliente::where('nombre','LIKE','%'.$query.'%')
                                    ->orWhere('apellido','LIKE','%'.$query.'%')
                                    ->orWhere('cod_cliente','LIKE','%'.$query.'%')
                                    ->get();
            }else{
                $Clientes= cliente::all();
            }
            if(isset($Clientes)){
                $total=$Clientes->count();
                $output='';

                if($total>0)
                {
                    foreach($Clientes as $cliente){
                    $redireccion = route('Clientes.edit', $cliente->cod_cliente);
                    $output .='
                    <tr>
                    <td>'.$cliente->cod_cliente.'</td>
                    <td>'.$cliente->nombre.'</td>
                    <td>'.$cliente->apellido.'</td>
                    <td>'.$cliente->direccion.'</td>
                    <td>'.$cliente->telefono.'</td>
                    <td>'.$cliente->rubro.'</td>
                    <td>'.$cliente->nit.'</td>
                    <td>'.$cliente->num_consumidor.'</td>
                    <td><a href="'.$redireccion.'"><button type="button" class="btn btn-success">Editar</button></a></td>

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
            echo json_encode($output);
        }
    }
}
