<?php

namespace App\Http\Controllers;


use App\pedidoventa;
use Illuminate\Http\Request;
use App\Http\Requests\FormVentasIngresar;
use App\cliente;
use App\producto;
use Illuminate\Support\Facades\Auth;
use App\venta;
use App\role;
use App\empleado;
use App\historialventa;
use App\Http\Middleware\Ventas;

class VentasController extends Controller
{



  public function __construct()
  {
        $this->middleware('bodega')->only(['index']);
        $this->middleware('ventas')->only(['create']);

  }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidoVentas = pedidoventa::paginate(10);

        return view('ventas.vistaVentas', compact('pedidoVentas'));
    }

    public function index2()
    {
        $pedidoVentas = venta::where('estado','pendiente')->get();

        return view('ventas.VentasPendientes', compact('pedidoVentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cliente = cliente::all();
        //dd($cliente);
        $producto = producto::where('cantidad', '>', 0)->get();



        return view('ventas.crearVentas',compact('cliente','producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormVentasIngresar $request)
    {

        $codEmpleado = Auth::user()->id; //jordan

            $ventas = new venta;
            $ventas->cod_empleado_fk = $codEmpleado; //Jordan Logueo
            $ventas->cod_cliente_fk = $request->nombreventa;
            $ventas->direccion = $request->iddireccion;
            $ventas->estado ="pendiente";
            $ventas->total= substr($request->idtotal,1);
            $ventas->save();


           // dd($request->nombreproducto);
            //$pedidoventa->cod_producto_fk = $request->nombreproducto;
              // $arrayProductos = $request->nombreproducto;


              // dd($ultimaVenta->cod_venta);


            //   Recuperando el codigo de la ultima venta
              $codUltimaVenta = venta::orderBy('cod_venta', 'desc')->first()->cod_venta;

            //   Arreglo de codigos de productos



            $productos = $request->nombreproducto;

               //dd($productos);


            // Arreglo de cantidades de productos
            $cantidades = $request->idcantidad;


              $i = 0;

              while ($i < sizeof($productos) ) {
                if($productos[$i]!=null){
                  $pedidoventa = new pedidoventa;
                  $productoArray=explode("$",$productos[$i]);
                  $NombreProducto=$productoArray[0];

                  $pedidoventa->cod_venta_fk = $codUltimaVenta;

                  // Recuperando el codigo del producto
                  $pedidoventa->cod_producto_fk = producto::where('nombre', $NombreProducto)->first()->cod_producto;

                  // Recuperando el precio del producto
                  //$precioProducto = producto::where('nombre', $NombreProducto)->first()->precio;

                  $pedidoventa->cantidad = $cantidades[$i];
                  //$pedidoventa->total = $pedidoventa->cantidad * $precioProducto;
                  $pedidoventa->save();

                  $cant=producto::where('nombre', $NombreProducto)->first()->cantidad;
                  $cant=$cant-$cantidades[$i];
                  $pro=producto::find(producto::where('nombre', $NombreProducto)->first()->cod_producto);
                  $pro->cantidad=$cant;
                  $pro->save();
                }

                $i++;
            }

         //   $id = $request->idcodventa;

        // $cliente = cliente::all();

        // $producto = producto::all();
        // $mensaje = "Producto Agreado Correctamente";
        // return view('ventas.crearVentas',compact('cliente','producto','mensaje'))->with('mensaje','Registro Exitoso');
       // return view('home');

       return redirect(route('Ventas.create'))->with('datos','Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cliente)
    {
       return redirect()->route('Ventas.create')->with('listado','Producto Agregado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $codCliente = venta::find($id)->cod_cliente_fk;

      $direccion = venta::find($id)->direccion;

      $total = venta::find($id)->total;

      // dd($total);

      // dd($direccion);

      $clientes = cliente::all();

      $nombreCliente = cliente::find($codCliente)->nombre;

      $apellidoCliente = cliente::find($codCliente)->apellido;

      // dd($apellidoCliente);

      $productosVenta = pedidoventa::where('cod_venta_fk', $id)->get();

      $productosIventario = producto::all();

      // dd($productos);



      return view('ventas.modiVentasPendientes', compact('id','codCliente', 'direccion', 'clientes', 'nombreCliente', 'apellidoCliente', 'productosVenta', 'total', 'productosIventario'));
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

        // Actualizando la venta
        $venta = venta::findOrFail($id);
<<<<<<< HEAD


=======
        
>>>>>>> 59cdc868766d8f0bd509d1bb306dfc37853f251e
        $venta->direccion = $request->iddireccion;

        $totalVenta = $request->idtotal;

        $totalVenta = substr($request->idtotal, 1);


        $venta->total = $totalVenta;


        if ($request->nombreventa) {
          $venta->cod_cliente_fk = $request->nombreventa;
        }

        $venta->update();


<<<<<<< HEAD

=======
      $pedidosVenta = pedidoventa::where('cod_venta_fk', $id)->get();
>>>>>>> 59cdc868766d8f0bd509d1bb306dfc37853f251e

      $productosNombre = array();
      $productosVendidosNombre = array();
      $cantidadesDiccionario = array();
      $codigosPedidoDiccionario = array();
      $cantidadesPedidoDiccionario = array();

      $productosFormulario = $request->nombreproducto;
      $cantidadesFormulario = $request->idcantidad;


      // Quitando el precio de los productos del formulario
      $i = 0;
      foreach ($productosFormulario as $productoForm) {
        $productoArray = explode('$', $productoForm);

        $productoArray[0] = rtrim($productoArray[0]);

        $cantidadesDiccionario[$productoArray[0]] = $cantidadesFormulario[$i];
        $i++;
        array_push($productosNombre, $productoArray[0]);
      }

      // Recuperando los nombres de los productos vendidos
      foreach ($pedidosVenta as $productoVenta) {
        $nombreP = producto::where('cod_producto', $productoVenta->cod_producto_fk)->value('nombre');

<<<<<<< HEAD
            // $productoArray=explode("$",$productosFormulario[$j]);
            foreach ($productosFormulario as $productoFormulario) {
              $productoArray = explode("$", $productoFormulario);
              // dd($productoArray);
              $productoArray[0] = rtrim($productoArray[0]);
              array_push($NombreProducto, $productoArray[0]);
            }

            // dd($NombreProducto);

            // dd($productosPedidoVenta);

=======
        $codigosPedidoDiccionario[$nombreP] = $productoVenta->cod_pedidoventa;

        $cantidadesPedidoDiccionario[$nombreP] = $productoVenta->cantidad;
>>>>>>> 59cdc868766d8f0bd509d1bb306dfc37853f251e

        array_push($productosVendidosNombre, $nombreP);
      }


      // Eliminar pedidosventas

      foreach ($productosVendidosNombre as $productoVendido) {
        

        if (!in_array($productoVendido, $productosNombre, true)) {

            $productoInventario = producto::where('nombre', $productoVendido)->first();

            $productoInventario->cantidad += $cantidadesPedidoDiccionario[$productoVendido];

            $productoInventario->update();

            $codigoVentaModificar = $codigosPedidoDiccionario[$productoVendido];

            $pedidoVentaModificar = pedidoventa::find($codigoVentaModificar);

            $pedidoVentaModificar->delete();
        }


      }



<<<<<<< HEAD
        while ($i < sizeof($productosFormulario)) {

          // Quitando el simbolo de $
          $productoArray=explode("$",$productosFormulario[$i]);
          $NombreProducto=$productoArray[0];
          // dd(producto::where('nombre', $NombreProducto)->first()->cod_producto);
=======
      // Modificar o agregar pedidosventas
      foreach ($productosNombre as $producto) {
        
        // Agregando productos a la venta
        if (!in_array($producto, $productosVendidosNombre, true)) {
          
          $productoInventario = producto::where('nombre', $producto)->first();

          $nuevoPedidoVenta = new pedidoventa();

          $nuevoPedidoVenta->cod_venta_fk = $id;
>>>>>>> 59cdc868766d8f0bd509d1bb306dfc37853f251e

          $nuevoPedidoVenta->cod_producto_fk = producto::where('nombre', $producto)->value('cod_producto');

<<<<<<< HEAD
          // dd($codigoProducto);

          if ($cantidadProductosVendidos > $i) {


            $productosPedidoVenta[$i]->cod_producto_fk = $codigoProducto;


            // Recuperando el producto desde inventario
            $productoInventario = producto::where('nombre', $NombreProducto)->first();
            // dd($productoInventario);

            // Comprobando que la cantidad de producto se cambio en el formulario
            if ($productosPedidoVenta[$i]->cantidad != $cantidadesFormulario[$i]) {


              // Actualizando el stock en el inventario
              if ($productosPedidoVenta[$i]->cantidad > $cantidadesFormulario[$i]) {

                $diferencia = $productosPedidoVenta[$i]->cantidad - $cantidadesFormulario[$i];

                $productoInventario->cantidad += $diferencia;
              }else{

                $diferencia = $cantidadesFormulario[$i] - $productosPedidoVenta[$i]->cantidad;
                $productoInventario->cantidad -= $diferencia;
              }

              // Actualizando la cantidad vendida del producto
              $productosPedidoVenta[$i]->cantidad = $cantidadesFormulario[$i];

              $productoInventario->update();
            }
=======
          $nuevoPedidoVenta->cantidad = $cantidadesDiccionario[$producto];

          $productoInventario->cantidad -= $cantidadesDiccionario[$producto];
          
          $productoInventario->update();
>>>>>>> 59cdc868766d8f0bd509d1bb306dfc37853f251e

          $nuevoPedidoVenta->save();

        }else{

          $productoInventario = producto::where('nombre', $producto)->first();

<<<<<<< HEAD
            $nuevoPedidoVenta->cod_venta_fk = $id;

            $nuevoPedidoVenta->cod_producto_fk = $codigoProducto;
=======
          $codigoVentaModificar = $codigosPedidoDiccionario[$producto];
>>>>>>> 59cdc868766d8f0bd509d1bb306dfc37853f251e

          $pedidoVentaModificar = pedidoventa::find($codigoVentaModificar);


<<<<<<< HEAD

            //Actualizando el stock
            $productoInventario->cantidad -= $cantidadesFormulario[$i];
=======
          if ($cantidadesDiccionario[$producto] > $cantidadesPedidoDiccionario[$producto]) {
            $diferencia = $cantidadesDiccionario[$producto] - $cantidadesPedidoDiccionario[$producto];

            $productoInventario->cantidad -= $diferencia;

            $productoInventario->update();
          }else{

            $diferencia = $cantidadesPedidoDiccionario[$producto] - $cantidadesDiccionario[$producto];

            $productoInventario->cantidad += $diferencia;
>>>>>>> 59cdc868766d8f0bd509d1bb306dfc37853f251e

            $productoInventario->update();

          }

          $pedidoVentaModificar->cantidad = $cantidadesDiccionario[$producto];

          $pedidoVentaModificar->update();

        }
      }

      // Registrando el codigo del empleado 

      $bitacora= new historialventa();
      $bitacora->operacion="Modificar";
      $bitacora->cod_empleado_fk=Auth::user()->cod_empleado_fk;
      $bitacora->cod_venta_fk=$id;
      $bitacora->save();

      return redirect('/PendienteVenta')->with('datos', 'Los datos se actualizaron correctamente');

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
    public function cantidad (Request $request){
      if($request->ajax()){
        $query = trim($request->get('query'));
        //$venta = trim($request->get('ventas'));
        $cant = producto::where('nombre', $query)->value('cantidad');
        $lel='ok';
        echo json_encode($cant);
      }
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
                      $pedidoVenta= pedidoventa::where('cod_producto_fk',$ItemP->cod_producto)
                                                  ->get();

                      foreach($pedidoVenta as $hventa){
                        $Venta= venta::where('cod_venta',$hventa->cod_venta_fk)->value('cod_empleado_fk');
                        //echo($hventa->cantidad);
                        $empleadoN= empleado::where('cod_empleado',$Venta)->value('nombre');
                        $empleadoA= empleado::where('cod_empleado',$Venta)->value('apellido');
                          $output .='
                          <tr>
                          <th scope="row">'.$ItemP->cod_producto.'</th>
                          <td>'.$ItemP->nombre.'</td>
                          <td>'.$hventa->cantidad.'</td>
                          <td>'.\Carbon\Carbon::parse($hventa->created_at)->format('d/m/Y').'</td>
                          <td>'.$empleadoN.' '.$empleadoA.'</td>

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

  public function buscadorPedidos(Request $request){

      if($request->ajax()){

          $query = trim($request->get('query'));
          $opc= $request->get('opc');
          if($query != ''){
<<<<<<< HEAD
              $pedidoventa = venta::where('cod_venta','LIKE','%'.$query.'%')
                          ->orWhere('direccion','LIKE','%'.$query.'%')
                          ->take(10)
                          ->get();
=======
              switch($opc){
                case 1:{  
                  $pedidoventa = venta::where('cod_venta','LIKE','%'.$query.'%')
                            ->get();
                    if(isset($pedidoventa)){
                      $total=$pedidoventa->count();
                      $output='';
                      if($total>0)
                      {
                          foreach($pedidoventa as $ItemP){
                          $redireccion = route('Ventas.edit', $ItemP->cod_venta);
                          $empleadoN= empleado::where('cod_empleado',$ItemP->cod_empleado_fk)->value('nombre');
                          $empleadoA= empleado::where('cod_empleado',$ItemP->cod_empleado_fk)->value('apellido');
                          $clienteN=cliente::where('cod_cliente',$ItemP->cod_cliente_fk)->value('nombre');
                          $clienteA=cliente::where('cod_cliente',$ItemP->cod_cliente_fk)->value('apellido');
                          $output .='
                          <div class="col-sm-4">
                          <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content</p>
                              <ul class="list-group list-group-flush">
                                  <li class="list-group-item">Vendido por: '.$empleadoN.' '.$empleadoA.'</li>
                                  <li class="list-group-item">Cliente: '.$clienteN.' '. $clienteA.'</li>
                                  <li class="list-group-item">Direccion: '.$ItemP->direccion.' </li>
                                  <li class="list-group-item">Total: $'.$ItemP->total.'</li>
                              </ul>
                              <a href="'.$redireccion.'" class="btn btn-primary">Editar</a>
                          </div>
                          </div>
                        </div>
                        
        
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
                }
                break;
                case 2:{
                  $empleados= empleado::where('nombre','LIKE','%'.$query.'%') 
                                    ->orWhere('apellido','LIKE','%'.$query.'%')                                     
                                    ->get();
                  if($empleados->count()>0){
                    foreach($empleados as $emp){
                      $Ventaemp= venta::where('cod_empleado_fk',$emp->cod_empleado)->get();
                      $output='';
                      foreach($Ventaemp as $vemp){
                        $pedidoventa = venta::where('cod_venta',$vemp->cod_venta)
                      ->get();
                      if(isset($pedidoventa)){
                        $total=$empleados->count();
                        if($total>0)
                        {
                            foreach($pedidoventa as $ItemP){
                            $redireccion = route('Ventas.edit', $ItemP->cod_venta);
                            $empleadoN= empleado::where('cod_empleado',$ItemP->cod_empleado_fk)->value('nombre');
                            $empleadoA= empleado::where('cod_empleado',$ItemP->cod_empleado_fk)->value('apellido');
                            $clienteN=cliente::where('cod_cliente',$ItemP->cod_cliente_fk)->value('nombre');
                            $clienteA=cliente::where('cod_cliente',$ItemP->cod_cliente_fk)->value('apellido');
                            $output .='
                            <div class="col-sm-4">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content</p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Vendido por: '.$empleadoN.' '.$empleadoA.'</li>
                                    <li class="list-group-item">Cliente: '.$clienteN.' '. $clienteA.'</li>
                                    <li class="list-group-item">Direccion: '.$ItemP->direccion.' </li>
                                    <li class="list-group-item">Total: $'.$ItemP->total.'</li>
                                </ul>
                                <a href="'.$redireccion.'" class="btn btn-primary">Editar</a>
                            </div>
                            </div>
                          </div>
                          
          
                            ';
          
                            }
          
                        }       
                        }
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
                break;
                case 3:{
                  $Clientes= cliente::where('nombre','LIKE','%'.$query.'%')
                                      ->orWhere('apellido','LIKE','%'.$query.'%')                                      
                                      ->get();
                  if($Clientes->count()>0){
                    foreach($Clientes as $emp){
                      $Ventaemp= venta::where('cod_cliente_fk',$emp->cod_cliente)->get();
                      $output='';
                      foreach($Ventaemp as $vemp){
                        $pedidoventa = venta::where('cod_venta',$vemp->cod_venta)
                      ->get();
                      if(isset($pedidoventa)){
                        $total=$Clientes->count();
                      
          
                        if($total>0)
                        {
                            foreach($pedidoventa as $ItemP){
                            $redireccion = route('Ventas.edit', $ItemP->cod_venta);
                            $empleadoN= empleado::where('cod_empleado',$ItemP->cod_empleado_fk)->value('nombre');
                            $empleadoA= empleado::where('cod_empleado',$ItemP->cod_empleado_fk)->value('apellido');
                            $clienteN=cliente::where('cod_cliente',$ItemP->cod_cliente_fk)->value('nombre');
                            $clienteA=cliente::where('cod_cliente',$ItemP->cod_cliente_fk)->value('apellido');
                            $output .='
                            <div class="col-sm-4">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content</p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Vendido por: '.$empleadoN.' '.$empleadoA.'</li>
                                    <li class="list-group-item">Cliente: '.$clienteN.' '. $clienteA.'</li>
                                    <li class="list-group-item">Direccion: '.$ItemP->direccion.' </li>
                                    <li class="list-group-item">Total: $'.$ItemP->total.'</li>
                                </ul>
                                <a href="'.$redireccion.'" class="btn btn-primary">Editar</a>
                            </div>
                            </div>
                          </div>
                          
          
                            ';
          
                            }
          
                        }        
                        }
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
                break;
              }
              
              
>>>>>>> 59cdc868766d8f0bd509d1bb306dfc37853f251e
          }else{
              $output='
              <tr>
                  <td align="center" colspan="5">Ingrese el valor correspondiente al filtro aplicado </td>
              </tr>
              ';
<<<<<<< HEAD
          }
          if(isset($pedidoventa)){
              $total=$pedidoventa->count();
              $output='';

              if($total>0)
              {
                  foreach($pedidoventa as $pedido){
                  $redireccion = route('Ventas.edit', $pedido->cod_venta);
                  $output .='

                      <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content</p>
                          <ul class="list-group list-group-flush">

                              <li class="list-group-item">Direccion:'.$pedido->direccion.'</li>
                              <li class="list-group-item">Total: '.$pedido->total.'</li>
                          </ul>

                          </div>
                      </div>


                  ';

                  // // Comprobando el rol del usuario que esta usando el sistema
                  // if (Auth::user()->tieneRol()->first() == "bodega") {
                  //     // Agregando el boton junto con el tr al final
                  //     $output .= '<td><a href="'.$redireccion.'"><button type="button" class="btn btn-success">Editar</button></a></td></tr>';
                  // }else{
                  //     // Agregando el tr sin el boton
                  //     $output .= '<tr>';
                  // }

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
=======
          } 
>>>>>>> 59cdc868766d8f0bd509d1bb306dfc37853f251e

          echo json_encode($output);
      }




  }



}
