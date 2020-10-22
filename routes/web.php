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
Route::get('napalm/home','HomeController@home');
Route::get('napalm/usuarios', 'UsuarioController@index');
Route::get('napalm/usuarios/create', 'UsuarioController@create');
//maps
Route::get('curls/{request}','UsuarioController@curls');
Route::get('regiones/{idPais}','UsuarioController@obtenerRegiones');
Route::get('provincias/{idRegion}','UsuarioController@obtenerProvincias');
Route::get('comunas/{idProvincia}','UsuarioController@obtenerComuna');
//crud usuarios
Route::resource('mantenedor-usuarios','UsuarioController');
Route::delete('mantenedor-usuarios/{id}',array(
    'uses'=>'UsuarioController@destroy',
    'as'=>'mantenedor-usuarios.delete'
));
