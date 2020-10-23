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
//rutas vistas usuario admin
Route::get('napalm/usuarios', 'UsuarioController@index');
Route::get('napalm/usuarios/create', 'UsuarioController@create');
Route::get('napalm/usuarios/editar/{idUsuario}','UsuarioController@edit');
//rutas vistas proyectos admin
Route::get('napalm/proyectos','ProyectoController@index');
Route::get('napalm/proyectos/create','ProyectoController@create');
Route::get('napalm/proyectos/editar/{idProyecto}','ProyectoController@edit');
//rutas vistas propiedades admin
Route::get('napalm/propiedades','PropiedadController@index');
Route::get('napalm/propiedades/create','PropiedadController@create');
Route::get('napalm/propiedades/editar/{idPropiedad}','PropiedadController@edit');
//mantenedores
//tipos usuarios
Route::get('napalm/tipos_usuarios','TipoUsuarioController@index');
//maps
Route::get('curls/{request}','UsuarioController@curls');
Route::get('regiones/{idPais}','UsuarioController@obtenerRegiones');
Route::get('provincias/{idRegion}','UsuarioController@obtenerProvincias');
Route::get('comunas/{idProvincia}','UsuarioController@obtenerComuna');
//crud usuarios
Route::resource('mantenedor-usuarios','UsuarioController');
Route::delete('mantenedor-usuarios/{idUsuario}',array(
    'uses'=>'UsuarioController@destroy',
    'as'=>'mantenedor-usuarios.delete'
));
//crud proyectos
Route::resource('mantenedor-proyectos','ProyectoController');
Route::delete('mantenedor-proyectos/{idProyecto}',array(
    'uses'=>'ProyectoController@destroy',
    'as'=>'mantenedor-proyectos.delete'
));
//crud propiedades
Route::resource('mantenedor-propiedades','PropiedadController');
Route::delete('mantenedor-propiedades/{idProyecto}',array(
    'uses'=>'PropiedadController@destroy',
    'as'=>'mantenedor-propiedades.delete'
));
//crud tipos usuarios
Route::resource('mantenedor-tipos_usuarios','TipoUsuarioController');
Route::delete('mantenedor-tipos_usuarios/{idTipoUsuario}',array(
    'uses'=>'TipoUsuarioController@destroy',
    'as'=>'mantenedor-tipos_usuarios.delete'
));