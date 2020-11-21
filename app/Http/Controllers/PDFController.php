<?php

namespace App\Http\Controllers;
use App\producto;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{

    public function __construct()
    {
        $this->middleware('compras')->only(['PDFProductos']);
    }

    public function PDFProductos(){
        $productos = producto::all();
        $pdf = PDF::loadView('PDF.prueba',compact('productos'));
        return $pdf->setPaper('a4', 'landscape')->stream('prueba.pdf');
    }
}
