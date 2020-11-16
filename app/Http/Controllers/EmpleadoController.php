<?php

namespace App\Http\Controllers;

use App\empleado;
use App\historialempleado;
use Illuminate\Http\Request;
use App\Http\Requests\FormEmpleados;
use App\role;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = empleado::paginate(10);

        return view('empleados.vistaEmpleados', compact('empleados'));
        
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
            $contador = 10;
        }


        $nombrePrimeraLetra = $request->NombreEmpleado[0];

        $apellidoPrimeraLetra = $request->ApellidoEmpleado[0];


        $DUIval = empleado::where('dui', $request->DUIE)->first();
        $correoval = User::where('email', $request->idcorreoE)->first();

        if($DUIval && $correoval){
            return redirect(route('Empleados.create'))->with('datos2', 'El dui y el correo deben ser unicos en el sistema');
        }
        else if ($DUIval) {
            return redirect(route('Empleados.create'))->with('datos2', 'El dui ya esta registrado en el sistema');
        }else if($correoval){
            return redirect(route('Empleados.create'))->with('datos2', 'El correo del empleado debe ser único');
        }
        else{

        

        $codigoNuevoEmpleado = $nombrePrimeraLetra . $apellidoPrimeraLetra . $contador;


        // Creando el empleado

        $nuevoEmpleado = new empleado();

        $nuevoEmpleado->cod_empleado = $codigoNuevoEmpleado;
        $nuevoEmpleado->nombre = $request->NombreEmpleado;
        $nuevoEmpleado->apellido = $request->ApellidoEmpleado;
        $nuevoEmpleado->dui = $request->DUIE;
        $nuevoEmpleado->telefono = $request->idtelefonoE;
        $nuevoEmpleado->edad = $request->idEdadE;
        $nuevoEmpleado->sexo = $request->sexoE;

        $nuevoEmpleado->save();


        // Creando el usuario

        $nuevoUsuario = new User();

        $correo = $request->idcorreoE;
        $codRol = $request->idrol;
        $contraseña = $request->idcontraseña1;

        $nuevoUsuario->cod_empleado_fk = $codigoNuevoEmpleado;
        $nuevoUsuario->name = $request->NombreEmpleado . " " . $request->ApellidoEmpleado;
        $nuevoUsuario->email = $correo;
        $nuevoUsuario->password = Hash::make($contraseña);

        $nuevoUsuario->save();

        // Ultimo usuario
        $codUsuario = User::orderBy('id', 'desc')->first()->id;


        // Insertando en la tabla role_user

        DB::insert('insert into role_user (user_id, role_id, created_at, 
                    updated_at) values (?, ?, ?, ?)', 
                    [$codUsuario, $codRol, Carbon::now(), Carbon::now()]);


                    
        return redirect(route('Empleados.create'))->with('datos', 'Empleado registrado correctamente');
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
        // dd($id);

        $empleado = empleado::findOrFail($id);

        $roles = role::all();

        $usuario = User::where('cod_empleado_fk', $empleado->cod_empleado)->first();

        // Devuelve un objeto
        $rolid = DB::select('select role_id from role_user where user_id = ?', [$usuario->id]);

        // dd($rolid);

        foreach ($rolid as $rid) {
           
            $rolUsuario = role::where('id', $rid->role_id)->first();
        }


        return view('empleados.modiEmpleados', compact('empleado', 'roles', 'id', 'rolUsuario'));
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
        // Actualizando el empleado
        $empleado = empleado::findOrFail($id);
        //dd($empleado);

        $duiemp = empleado::where('cod_empleado', $id)->first();
        $DUIval = empleado::where('dui', $request->DUIE)->first();
        if ($DUIval && $DUIval->dui != $duiemp->dui) {
            return redirect(route('Empleados.index'))->with('datos2', 'El dui ya esta registrado en el sistema, trate de nuevo');
        }else{

        $empleado->nombre = $request->NombreEmpleado;

        $empleado->apellido = $request->ApellidoEmpleado;

        $empleado->dui = $request->DUIE;

        $empleado->edad = $request->idEdadE;

        $empleado->sexo = $request->sexoE;

        $empleado->telefono = $request->idtelefonoE;

        $empleado->update();

        $usuario = User::where('cod_empleado_fk', $empleado->cod_empleado)->first();

        //Atualizando el rol
        DB::update('update role_user set role_id = ?, updated_at = ? where user_id = ?', [$request->idrol, Carbon::now(), $usuario->id]);

        // Registrando el codigo de la secretaria
        
        $bitacora= new historialempleado();
        $bitacora->operacion="Modificar";
        $bitacora->cod_secretaria_fk=Auth::user()->cod_empleado_fk;
        $bitacora->cod_empleado_fk=$id;
        $bitacora->save();
        
        return redirect(route('Empleados.index'))->with('datos', 'Empleado actualizado exitosamente');
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
                    $redireccion = route('Productos.edit', $ItemP->cod_producto);
                    $output .='
                    <tr>
                        <th scope="row">'.$ItemP->cod_producto.'</th>
                        <td>'.$ItemP->nombre.'</td>

                        <td>'.$ItemP->cantidad.'</td>
                        // Quite el tr de aqui para concatenarlo despues y asi no aparezca abajo el boton de editar

                    ';

                    // Comprobando el rol del usuario que esta usando el sistema
                    if (Auth::user()->tieneRol()->first() == "bodega") {
                        // Agregando el boton junto con el tr al final
                        $output .= '<td><a href="'.$redireccion.'"><button type="button" class="btn btn-success">Editar</button></a></td></tr>';
                    }else{
                        // Agregando el tr sin el boton
                        $output .= '<tr>';
                    }

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
