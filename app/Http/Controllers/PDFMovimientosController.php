<?php

namespace App\Http\Controllers;

use App\compra;

use App\pedidocompra;
use App\pedidoventa;
use App\venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFMovimientosController extends Controller
{

    public function __construct()
    {
        $this->middleware('pdf')->only(['movimientosCompras']);
        $this->middleware('pdf2')->only(['movimientosVentas']);
        
    }


    public function elegirFechasCompras()
    {

        return view('PDF.vistaComprasPDF');
    }

    public function elegirFechasVentas()
    {

        return view('PDF.vistaVentasPDF');
    }

    public function movimientosCompras(Request $request)
    {

        $fechaIncio = $request->finicio;

        $fechaFinal = $request->ffinal;

        $fechaFinal = date('Y-m-d', strtotime($fechaFinal."+ 1 days"));

        
        $comprasRecibidas = compra::where('estado', 'Recibido')
                                ->whereBetween('updated_at', [$fechaIncio, $fechaFinal])
                                ->get();

        if (sizeof( $comprasRecibidas) > 0) {
            $existe = "existe";
        }else{
            $existe = "no";
        }

        $pedidosCompras = pedidocompra::all();


        $pdf = PDF::loadView('PDF.movimientosCompras', compact('comprasRecibidas', 'pedidosCompras', 'existe'));
        
        return $pdf->setPaper('a4', 'landscape')->stream('compras.pdf');
        

    }


    public function movimientosVentas(Request $request)
    {
        $fechaIncio = $request->finicio;

        $fechaFinal = $request->ffinal;

        $fechaFinal = date('Y-m-d', strtotime($fechaFinal."+ 1 days"));


        $ventasEntregadas = venta::where('estado', 'Entregada')
                                ->whereBetween('updated_at', [$fechaIncio, $fechaFinal])
                                ->get();


        if (sizeof($ventasEntregadas) > 0) {
            $existe = "existe";
        }else{
            $existe = "no";
        }


        $pedidosVentas = pedidoventa::all();


        $pdf = PDF::loadView('PDF.movimientosVentas', compact('ventasEntregadas', 'pedidosVentas', 'existe'));
        
        return $pdf->setPaper('a4', 'landscape')->stream('ventas.pdf');
    }
}
