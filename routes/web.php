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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categorias','CategoriasController');
Route::resource('productos','ProductosController');
Route::get('/ejemplo', 'HomeController@ejemplo')->name('ejemplo');
Route::get('/create_ejemplo', 'HomeController@create_ejemplo')->name('create_ejemplo');
