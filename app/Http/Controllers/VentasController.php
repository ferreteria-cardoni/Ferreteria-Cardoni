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
            $ventas->save();


            
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
                  $precioProducto = producto::where('nombre', $NombreProducto)->first()->precio;
                  
                  $pedidoventa->cantidad = $cantidades[$i];
                  $pedidoventa->total = $pedidoventa->cantidad * $precioProducto;
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
