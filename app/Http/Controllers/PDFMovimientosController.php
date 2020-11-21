<?php

namespace App\Http\Controllers;

use App\compra;

use App\pedidocompra;
use App\pedidoventa;
use App\venta;
use Illuminate\Http\Request;
use PDF;

class PDFMovimientosController extends Controller
{

    public function __construct()
    {
        $this->middleware('pdf')->only(['movimientosCompras']);
        $this->middleware('pdf2')->only(['movimientosVentas']);
        
    }

    public function movimientosCompras()
    {
        $comprasRecibidas = compra::where('estado', 'Recibido')->get();

        $pedidosCompras = pedidocompra::all();


        $pdf = PDF::loadView('PDF.movimientosCompras', compact('comprasRecibidas', 'pedidosCompras'));
        
        return $pdf->setPaper('a4', 'landscape')->stream('compras.pdf');
    }


    public function movimientosVentas()
    {

        $ventasEntregadas = venta::where('estado', 'Entregada')->get();

        $pedidosVentas = pedidoventa::all();


        $pdf = PDF::loadView('PDF.movimientosVentas', compact('ventasEntregadas', 'pedidosVentas'));
        
        return $pdf->setPaper('a4', 'landscape')->stream('ventas.pdf');
    }
}
