<?php

use App\Http\Requests\BuscadorProducto;
use Illuminate\Http\Request;
use App\producto;
use App\marca_producto;
use App\marca;
use App\compra;
// use Symfony\Component\Routing\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('prueba', function ()
{

	$relacion = producto::findOrFail('poi123')->marcas;
	dd($relacion);


});

Route::get('/', 'HomeController@index')->name('home');

Route::resource('Productos','ProductoController');

Route::get('/buscador', 'ProductoController@buscador')->name('buscador');
Route::get('/listado', 'VentasController@listado')->name('listado');
//ruta para pagina de modificar producto prros
// Route::get('/modificar', 'ProductoController@modification');


Route::get('/Productos/create', 'ProductoController@create')
->middleware('role:bodega')->name('Productos.create');


//Route::get('/Productos', 'ProductoController@index')->middleware('role:ventas' , 'role:gerente')->name('Productos.index');



Route::group([
	'middleware' => 'role',
	'prefix' => 'role',
    'namespace' => 'role'
], function () {

	Route::get('/Productos', 'ProductoController@index')->name('Productos.index');

});

Route::resource('compras', 'ComprasController');

Route::resource('Ventas', 'VentasController');

Route::resource('Proveedores', 'ProveedorController');

Route::resource('Empleados', 'EmpleadoController');

Route::get('/cantidad', 'VentasController@cantidad')->name('cantidad');


Route::resource('Clientes', 'ClienteController');


Route::get('/buscadorCompra', 'ComprasController@buscador')->name('buscadorCompra');

Route::get('/buscadorVenta', 'VentasController@buscador')->name('buscadorVenta');


Route::get('ayuda/download', 'ayudaController@download');

Route::get('/PendienteVenta', 'VentasController@index2')->name('Pendiente');

Route::get('/buscadorPedidos1', 'VentasController@buscadorPedidos')->name('buscadorPedidos');

Route::get('/PendienteCompra', 'ComprasController@index2')->name('PendienteC');

Route::get('/buscadorCompras1', 'ComprasController@buscadorCompras')->name('buscadorCompras');

Route::get('/buscaemp', 'EmpleadoController@buscadoremp')->name('buscadorEmpleados');

Route::get('/desactivar/{id}', 'EmpleadoController@desactivar')->name('desactivar');

Route::get('/confirmar/{id}', 'VentasController@confirmar')->name('confirmarE');

Route::get('/confirmarC/{id}', 'ComprasController@confirmarC')->name('confirmarC');

Route::get('/pdfproductos', 'PDFController@PDFProductos')->name('generarpdf');

Route::get('/ReporteCompras', 'PDFMovimientosController@elegirFechasCompras')->name('comprasReporte');

Route::get('/ReporteVentas', 'PDFMovimientosController@elegirFechasVentas')->name('ventasReporte');

Route::get('/buscadorClientes', 'ClienteController@buscadorClientes')->name('buscadorClientes');

Route::post('/PdfMovimientosCompras', 'PDFMovimientosController@movimientosCompras')->name('pdfcompras');

Route::post('/PdfMovimientosVentas', 'PDFMovimientosController@movimientosVentas')->name('pdfventas');

