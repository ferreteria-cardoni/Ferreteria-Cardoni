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
class VentasController extends Controller
{
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cliente = cliente::all();
        $producto = producto::all();
   
      
        
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

        $nombreEmpleado = Auth::user()->id; //jordan
     
            $ventas = new venta;
            $ventas->cod_venta = $request->idcodventa;
            $ventas->cod_empleado_fk = $nombreEmpleado; //Jordan Logueo
            $ventas->cod_cliente_fk = $request->nombreventa;
            $ventas->direccion = $request->iddireccion;
            $ventas->save();


           // dd($request->nombreproducto);
            //$pedidoventa->cod_producto_fk = $request->nombreproducto;
              // $arrayProductos = $request->nombreproducto;
  // $pedidoventa->cantidad = $request->idcantidad1;
          
            $contProducto = 0;
        foreach ($request->nombreproducto as $key) {
            
            $contCantidad = 0;
             $pedidoventa = new pedidoventa;   
              $pedidoventa->cod_venta_fk = $request->idcodventa;
                $pedidoventa->cod_producto_fk = $key;
                $precioProducto = producto::findOrFail($key)->precio;
            foreach ($request->idcantidad1 as $key1) {
                 
                 if ($contProducto == $contCantidad) {
                       $pedidoventa->cantidad = $key1;  
                  $pedidoventa->total = $pedidoventa->cantidad * $precioProducto;
                $pedidoventa->save(); 
                break;
                     
                 }
                
               $contCantidad = $contCantidad +1;
            }
       
                $contProducto = $contProducto + 1;


        }



            
         //   $id = $request->idcodventa;

        $cliente = cliente::all();
      
        $producto = producto::all();
        
        return view('ventas.crearVentas',compact('cliente','producto'));
       // return view('home');
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
    
   $nombre = $request->nombreproducto1;
   $cantidad = $request->idcantidad1;

  
    

    // $listadoNEW[] = $listadoOLD; 
     //array_merge($listadoOLD, $listadoNEW);


    
    return redirect()->route('Ventas.create')->with('nombre', $nombre)->with('cantidad',$cantidad);
  
      
     
        //return view('ventas.crearVentas')->with('listado', $listado); 
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
