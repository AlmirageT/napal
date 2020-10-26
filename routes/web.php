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
//registrarse como usuario
Route::resource('registro', 'RegistroController');
//login
Route::get('login', 'LoginController@index');
Route::post('ingreso-session','LoginController@ingreso_session');
Route::post('logout', 'LoginController@logout');

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
//tipo telefonos
Route::get('napalm/tipos_telefonos','TipoTelefonoController@index');
//tipo personas
Route::get('napalm/tipos_personas','TipoPersonaController@index');
//tipo inversiones
Route::get('napalm/tipos_inversiones','TipoInversionController@index');
//tipo flexibilidad
Route::get('napalm/tipos_flexibilidades','TipoFlexibilidadController@index');
//tipo estados
Route::get('napalm/tipos_estados','TipoEstadoController@index');
//tipos documentos
Route::get('napalm/tipos-documentos','TipoDocumentoController@index');
//tipo credito
Route::get('napalm/tipos-creditos','TipoCreditoController@index');
//tipo calidades
Route::get('napalm/tipos-calidades','TipoCalidadController@index');
//Monedas
Route::get('napalm/monedas','MonedaController@index');
//idiomas
Route::get('napalm/idiomas','IdiomaController@index');
//estados
Route::get('napalm/estados','EstadoController@index');
//maps
Route::get('curls/{request}','UsuarioController@curls');
Route::get('regiones/{idPais}','UsuarioController@obtenerRegiones');
Route::get('provincias/{idRegion}','UsuarioController@obtenerProvincias');
Route::get('comunas/{idProvincia}','UsuarioController@obtenerComuna');
//parametros generales
Route::get('napalm/parametros-generales','ParametroGeneralController@index');
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
//crud tipos telefonos
Route::resource('mantenedor-tipos_telefonos','TipoTelefonoController');
Route::delete('mantenedor-tipos_telefonos/{idTipoTelefono}',array(
    'uses'=>'TipoTelefonoController@destroy',
    'as'=>'mantenedor-tipos_telefonos.delete'
));
//crud tipos personas
Route::resource('mantenedor-tipos_personas','TipoPersonaController');
Route::delete('mantenedor-tipos_personas/{idTipoPersona}',array(
    'uses'=>'TipoPersonaController@destroy',
    'as'=>'mantenedor-tipos_personas.delete'
));
//crud tipo inversiones
Route::resource('mantenedor-tipos_inversiones','TipoInversionController');
Route::delete('mantenedor-tipos_inversiones/{idTipoInversion}',array(
    'uses'=>'TipoInversionController@destroy',
    'as'=>'mantenedor-tipos_inversiones.delete'
));
//crud tipo flexibilidades
Route::resource('mantenedor-tipos_flexibilidades','TipoFlexibilidadController');
Route::delete('mantenedor-tipos_flexibilidades/{idTipoFlexibilidad}',array(
    'uses'=>'TipoFlexibilidadController@destroy',
    'as'=>'mantenedor-tipos_flexibilidades.delete'
));
//crud tipos estados
Route::resource('mantenedor-tipos_estados','TipoEstadoController');
Route::delete('mantenedor-tipos_estados/{idTipoEstado}',array(
    'uses'=>'TipoEstadoController@destroy',
    'as'=>'mantenedor-tipos_estados.delete'
));
//crud tipos documentos
Route::resource('mantenedor-tipos_documentos','TipoDocumentoController');
Route::delete('mantenedor-tipos_documentos/{idTipoDocumento}',array(
    'uses'=>'TipoDocumentoController@destroy',
    'as'=>'mantenedor-tipos_documentos.delete'
));
//crud tipos creditos
Route::resource('mantenedor-tipos_creditos','TipoCreditoController');
Route::delete('mantenedor-tipos_creditos/{idTipoCredito}',array(
    'uses'=>'TipoCreditoController@destroy',
    'as'=>'mantenedor-tipos_creditos.delete'
));
//crud tipos calidades
Route::resource('mantenedor-tipos_calidades','TipoCalidadController');
Route::delete('mantenedor-tipos_calidades/{idTipoCalidad}',array(
    'uses'=>'TipoCalidadController@destroy',
    'as'=>'mantenedor-tipos_calidades.delete'
));
//crud monedas
Route::resource('mantenedor-monedas','MonedaController');
Route::delete('mantenedor-monedas/{idMoneda}',array(
    'uses'=>'MonedaController@destroy',
    'as'=>'mantenedor-monedas.delete'
));
//crud idiomas
Route::resource('mantenedor-idiomas','IdiomaController');
Route::delete('mantenedor-idiomas/{idIdioma}',array(
    'uses'=>'IdiomaController@destroy',
    'as'=>'mantenedor-idiomas.delete'
));
//crud estados
Route::resource('mantenedor-estados','EstadoController');
Route::delete('mantenedor-estados/{idEstado}',array(
    'uses'=>'EstadoController@destroy',
    'as'=>'mantenedor-estados.delete'
));
//crud parametros generales
Route::resource('mantenedor-parametros-generales','ParametroGeneralController');
Route::delete('mantenedor-parametros-generales/{idParametroGeneral}',array(
    'uses'=>'ParametroGeneralController@destroy',
    'as'=>'mantenedor-parametros-generales.delete'
));