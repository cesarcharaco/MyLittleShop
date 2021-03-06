<?php

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
use App\Productos;

Route::get('/','ProductosController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categorias','CategoriasController');

Route::get('productos/imagenes','ProductosController@imagenes')->name('productos.imagenes');
Route::resource('productos','ProductosController');
Route::post('productos/eliminar_imagen','ProductosController@eliminar_imagen')->name('eliminar_imagen');
Route::post('productos/mostrar','ProductosController@mostrar')->name('productos.mostrar_producto');

Route::resource('clientes','ClientesController');
Route::post('clientes/cambiar_status','ClientesController@cambiar_status')->name('clientes.cambiar_status');
Route::get('/ejemplo', 'HomeController@ejemplo')->name('ejemplo');
Route::get('/create_ejemplo', 'HomeController@create_ejemplo')->name('create_ejemplo');
Route::get('perfil','ClientesController@perfil')->name('perfil.index');

Route::resource('ventas','VentasController');
Route::get('show/{id_producto}/product','VentasController@show_product')->name('show_product');
Route::post('agregar/carrito','VentasController@addCarrito')->name('add.carrito');
Route::post('remover/carrito','VentasController@removeCarrito')->name('remove.carrito');
Route::post('pagar','VentasController@pagar')->name('pagar');
Route::post('validar/venta','VentasController@validarVenta')->name('validar.venta');
Route::post('pagar','VentasController@pagar')->name('pagar');
Route::get('porverificar','VentasController@ventas_por_verificar')->name('ventas.por.verificar');
Route::post('cerrar/venta','VentasController@validarVenta')->name('cerrar.venta');
Route::get('listar/ventas','VentasController@listar')->name('ventas.listar');
Route::get('ventas/{id_venta}/detalles','VentasController@detalles')->name('ventas.detalles');


Route::get('reportes/index','ReportesController@index')->name('reportes.index');
Route::post('reportes/mostrar','ReportesController@mostrar')->name('mostrar_reporte');