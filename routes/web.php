<?php

use App\Http\Requests\BuscadorProducto;
use App\producto;
use App\marca_producto;
use App\marca;
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

Route::resource('ventas', 'VentasController');









