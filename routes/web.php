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

Route::get('/', 'WelcomeController@index');
//politicas de privacidad
Route::view('politicas-privacidad','politicasPrivacidad');
//contacta con nosotros
Route::view('contacta-con-nosotros','contactaNosotros');
//como funciona
Route::view('como-funciona','public.comoFunciona');
//faq's
Route::get('preguntas-frecuentes','FaqController@preguntasFrecuentes');
//financiate
Route::view('financiacion-empresas','public.financiacion');
//quienes somos
Route::view('quienes-somos','public.quienesSomos');
//favoritos
Route::get('propiedad-favorita/{idPropiedad}', 'PropiedadFavoritaController@index');
//paginas dashboard usuario
Route::group(['prefix'=>'dashboard'], function(){
    Route::get('/','DashboardController@index');
    Route::get('oportunidades','TiendaController@index');
    Route::get('oportunidades/financiado','TiendaController@financiado');
    Route::get('oportunidades/cerrado','TiendaController@cerrado');
    Route::get('oportunidades/no-financiado','TiendaController@no_financiado');
    Route::get('mis-inversiones','MisInversionesController@index');
    Route::get('mi-inversion/detalle','MisInversionesController@detalle');
    Route::view('mi-cuenta','public.miCuenta');  
    Route::view('documentos-informes','public.documentosInformes');
    Route::view('mis-datos','public.miDatos');  
    Route::view('mis-datos/datos-adicionales','public.ajustesCuenta');
    Route::view('mis-datos/mis-promociones','public.misPromociones');
    Route::view('mi-cuenta/movimientos','public.misMovimientos');
    Route::view('promo-amigo','public.invitaUnAmigo');
    Route::view('mi-cuenta/cuentas-bancarias','public.cuentasAsociadas');
    Route::view('mi-cuenta/cuentas-bancarias/nueva','public.añadirCuentaBancaria');
    Route::get('mi-cuenta/ingresos','SaldoDisponibleController@index');
    Route::view('mi-cuenta/retiros','public.retiros');
    //vistas fallor exito
    Route::view('fallo','public.paypal.fallo');
    Route::view('exito','public.paypal.exito');

    //paypal
    Route::post('paypal', 'SaldoDisponibleController@payWithpaypal');
    Route::get('status', 'SaldoDisponibleController@getPaymentStatus');
});
//datatables
Route::post('datatable-ingresos','BusquedaController@tablaIngresos');
Route::post('datatable-egresos','BusquedaController@tablaEgresos');
Route::post('datatable-destinos-egresos','BusquedaController@tablaDestinoEgreso');
Route::post('datatable-usuarios','BusquedaController@tablaUsuario');
Route::post('datatable-proyectos','BusquedaController@tablaProyecto');
Route::post('datatable-propiedades','BusquedaController@tablaPropiedad');
Route::post('datatable-casos-exitosos','BusquedaController@tablaCasosExitosos');
Route::post('datatable-comunas','BusquedaController@tablaComunas');
Route::post('datatable-provincias','BusquedaController@tablaProvincias');
//ruta para prueba de envio de mail por x tiempo de finalizacion
//Route::get('link-prueba','MensajeriaController@correoUsuariosQueNoHanInvertido');
//Route::get('link-prueba-2','MensajeriaController@corrreoUsuariosQueHanInvertido');
//contacta con nosotros
Route::post('enviar-solicitud','ContactaConNosotrosController@enviarCorreo');
Route::get('ver-documento/{ver_pdf}','DocumentoController@ver_pdf');
//detalle propiedades
Route::get('detalle/{idPropiedad}','DetalleController@index');
//uri nueva
Route::get('invierte/chile/propiedad/detalle','DetalleController@index');
Route::post('invierte-propiedad/{idPropiedad}','InvierteController@invierte');
Route::post('verificacion-pago','InvierteController@verificarDatos');
//link mientras no haya funcionamiento con sistema transbank
Route::view('exito','exito');
//invierte
Route::get('invierte','TiendaController@index');
//uri nueva
Route::get('invierte/chile/propiedad','TiendaController@index');
Route::get('invierte/chile/propiedad/financiado','TiendaController@financiado');
Route::get('invierte/chile/propiedad/cerrado','TiendaController@cerrado');
Route::get('invierte/chile/propiedad/no-financiado','TiendaController@no_financiado');

//reenvio de msj
Route::post('/vaes', 'LoginController@reenviarSMS');
//errores
Route::get('notificacion/cuentaYaActivada', 'ActivarCuentaController@cuentaYaActivada');
Route::get('notificacion/cuentaActivadaCorrectamente', 'ActivarCuentaController@cuentaActivadaCorrectamente');
Route::get('notificacion/cuentaNoEncontrada', 'ActivarCuentaController@cuentaNoEncontrada');
Route::get('notificacion/errorInterno', 'ActivarCuentaController@errorInterno');
//estadisticas
Route::get('estadisticas','PublicController@estadisitca');
//registrarse como usuario
Route::get('registro','RegistroController@index');
Route::resource('registro', 'RegistroController');
//login
Route::get('login', 'LoginController@index');
Route::post('ingreso-session','LoginController@ingreso_session');
Route::post('logout', 'LoginController@logout');
//rutas administrador
Route::group(['prefix' => 'napalm'], function(){
    Route::get('/','HomeController@home');
    Route::get('home','HomeController@home');
    //rutas vistas usuario admin
    Route::get('usuarios', 'UsuarioController@index');
    Route::get('usuarios/create', 'UsuarioController@create');
    Route::get('usuarios/editar/{idUsuario}','UsuarioController@edit');
    Route::get('usuarios/telefonos/{idUsuario}','TelefonoController@create');
    //rutas vistas proyectos admin
    Route::get('proyectos','ProyectoController@index');
    Route::get('proyectos/create','ProyectoController@create');
    Route::get('proyectos/editar/{idProyecto}','ProyectoController@edit');
    //rutas vistas propiedades admin
    Route::get('propiedades','PropiedadController@index');
    Route::get('propiedades/create','PropiedadController@create');
    Route::get('propiedades/editar/{idPropiedad}','PropiedadController@edit');
    //mantenedores
    //tipos usuarios
    Route::get('tipos_usuarios','TipoUsuarioController@index');
    //tipo telefonos
    Route::get('tipos_telefonos','TipoTelefonoController@index');
    //tipo personas
    Route::get('tipos_personas','TipoPersonaController@index');
    //tipo inversiones
    Route::get('tipos_inversiones','TipoInversionController@index');
    //tipo flexibilidad
    Route::get('tipos_flexibilidades','TipoFlexibilidadController@index');
    //tipo estados
    Route::get('tipos_estados','TipoEstadoController@index');
    //tipos documentos
    Route::get('tipos-documentos','TipoDocumentoController@index');
    //tipo credito
    Route::get('tipos-creditos','TipoCreditoController@index');
    //tipo calidades
    Route::get('tipos-calidades','TipoCalidadController@index');
    //tipo faq
    Route::get('tipos-faqs','TipoFaqController@index');
    //Monedas
    Route::get('monedas','MonedaController@index');
    //idiomas
    Route::get('idiomas','IdiomaController@index');
    //estados
    Route::get('estados','EstadoController@index');
    //subir documentos
    Route::get('subir-documentos/create/{idPropiedad}','DocumentoController@create');
    //ver documento
    Route::get('documentos/ver-documento/{idDocumento}','DocumentoController@ver_pdf');
    //transacciones
    //ingresos
    Route::get('ingresos','TrxIngresoController@index');
    Route::get('ingresos/detalles/{idTrxIngreso}','TrxIngresoController@detalle');
    //egresos
    Route::get('egresos','TrxEgresoController@index');
    Route::get('egresos/detalles/{idTrxEgreso}','TrxEgresoController@detalle');
    //destino egresos
    Route::get('destinos-egresos','DestinoEgresoController@index');
    Route::get('destinos-egresos/detalles/{idTrxEgreso}','DestinoEgresoController@detalle');
    //tipo medios de pago
    Route::get('tipos-medio-pago','TipoMedioPagoController@index');
    //ubicaciones
    //paises
    Route::get('paises','PaisController@index');
    //regiones
    Route::get('regiones','RegionController@index');
    //provincias
    Route::get('provincias','ProvinciaController@index');
    Route::get('edit-provincia/{idProvincia}','ProvinciaController@edit');
    //comunas
    Route::get('comunas','ComunaController@index');
    Route::get('edit-comuna/{idComuna}','ComunaController@edit');
    //imagenes carrusel
    Route::get('imagenes-carrusel','ImagenesCarruselController@index');
    //casos exitosos
    Route::get('casos-exitosos','CasoExitosoController@index');
    Route::get('edit-casos-exitoso/{idCasoExitoso}','CasoExitosoController@edit');
    //parametros generales
    Route::get('parametros-generales','ParametroGeneralController@index');
    //redes sociales
    Route::get('redes-sociales','RedSocialController@index');
    //codigos
    Route::get('codigos-promocionales','CodigoController@index');
    //condiciones y servicios
    Route::get('condiciones-servicios','CondicionServicioController@index');
    //imagenes propiedades
    Route::get('imagenes/{idPropiedad}/create','ImagenPropiedadController@index');
    //dropzone
    Route::post('img-propiedad/{idPropiedad}','ImagenPropiedadController@dropzone');
    //imagenes plano propiedades
    Route::get('planos/{idPropiedad}/create','FotoPlanoController@index');
    //dropzone planos
    Route::post('img-planos/{idPropiedad}','FotoPlanoController@dropzone');
    //mision empresa
    Route::get('mision-empresa','MisionEmpresaController@index');
    //faq
    Route::get('faqs','FaqController@index');
    //cambio dolar
    Route::get('cambio-dolar','CambioDolarController@index');
});
//quieres saber mas
Route::get('saber-mas','CondicionServicioController@saberMas');
//condiciones y servicios pdf de register
Route::get('condiciones-servicios/documento/{idCondicionServicio}','CondicionServicioController@ver_condiciones_servicios');
//order by
//Route::get('ordenar-propiedades/{idEstado}','TiendaController@ordenarPropiedades');
//busqueda en tiempo real para datatable ingresos
Route::post('buscador-prueba','BusquedaController@busqueda_ingresos');
//busqueda en tiempo real para datatable de egresos
Route::post('buscador-egresos','BusquedaController@busqueda_egresos');
//busqueda en tiempo real para datatabla de destino degresos
Route::post('buscador-destinos-egresos','BusquedaController@busqueda_destino_egreso');
//maps
Route::get('curls/{request}','UsuarioController@curls');
Route::get('regiones/{idPais}','UsuarioController@obtenerRegiones');
Route::get('provincias/{idRegion}','UsuarioController@obtenerProvincias');
Route::get('comunas/{idProvincia}','UsuarioController@obtenerComuna');
//busqueda propiedad
Route::get('obtenerPropiedad/{idPropiedad}','WelcomeController@obtenerPropiedad');
//crud usuarios
Route::resource('mantenedor-usuarios','UsuarioController');
Route::get('napalm/usuarios/delete/{idUsuario}','UsuarioController@destroy');
//crud proyectos
Route::resource('mantenedor-proyectos','ProyectoController');
Route::get('napalm/proyectos/destroy/{idProyecto}','ProyectoController@destroy');
//crud propiedades
Route::resource('mantenedor-propiedades','PropiedadController');
Route::get('napalm/propiedades/destroy/{idPropiedad}','PropiedadController@destroy');
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
//crud documentos
Route::resource('mantenedor-documentos','DocumentoController');
Route::delete('mantenedor-documentos/{idDocumento}',array(
    'uses'=>'DocumentoController@destroy',
    'as'=>'mantenedor-documentos.delete'
));
//crud telefonos
Route::resource('mantenedor-telefonos','TelefonoController');
Route::delete('mantenedor-telefonos/{idTelefono}',array(
    'uses'=>'TelefonoController@destroy',
    'as'=>'mantenedor-telefonos.delete'
));
//crud paises
Route::resource('mantenedor-paises','PaisController');
Route::delete('mantenedor-paises/{idPais}',array(
    'uses'=>'PaisController@destroy',
    'as'=>'mantenedor-paises.delete'
));
//crud regiones
Route::resource('mantenedor-regiones','RegionController');
Route::delete('mantenedor-regiones/{idRegion}',array(
    'uses'=>'RegionController@destroy',
    'as'=>'mantenedor-regiones.delete'
));
//crud provincias
Route::resource('mantenedor-provincias','ProvinciaController');
Route::get('napalm/destroy-provincia/{idProvincia}','ProvinciaController@destroy');
//crud comunas
Route::resource('mantenedor-comunas','ComunaController');
Route::get('napalm/destroy-comuna/{idComuna}','ComunaController@destroy');
//crud carrusel
Route::resource('mantenedor-carrusel','ImagenesCarruselController');
Route::delete('mantenedor-carrusel/{idImagenCarrusel}',array(
    'uses'=>'ImagenesCarruselController@destroy',
    'as'=>'mantenedor-carrusel.delete'
));
//crud casos exitosos
Route::resource('mantenedor-casos-exitosos','CasoExitosoController');
Route::get('napalm/casos-exitosos/destroy/{idCasoExitoso}','CasoExitosoController@destroy');
//crud redes sociales
Route::resource('mantenedor-redes-sociales','RedSocialController');
Route::delete('mantenedor-redes-sociales/{idRedSocial}',array(
    'uses'=>'RedSocialController@destroy',
    'as'=>'mantenedor-redes-sociales.delete'
));
//crud codigos promocionales
Route::resource('mantenedor-codigos','CodigoController');
Route::delete('mantenedor-codigos/{idCodigo}',array(
    'uses'=>'CodigoController@destroy',
    'as'=>'mantenedor-codigos.delete'
));
//crud condiciones y servicios
Route::resource('mantenedor-condiciones-servicios','CondicionServicioController');
Route::delete('mantenedor-condiciones-servicios/{idCondicionServicio}',array(
    'uses'=>'CondicionServicioController@destroy',
    'as'=>'mantenedor-condiciones-servicios.delete'
));
//crud mision de la empresa
Route::resource('mantenedor-mision-empresa','MisionEmpresaController');
Route::delete('mantenedor-mision-empresa/{idMisionEmpresa}',array(
    'uses'=>'MisionEmpresaController@destroy',
    'as'=>'mantenedor-mision-empresa.delete'
));
//crud tipo faq
Route::resource('mantenedor-tipos-faqs','TipoFaqController');
Route::delete('mantenedor-tipos-faqs/{idTipoFaq}',array(
    'uses'=>'TipoFaqController@destroy',
    'as'=>'mantenedor-tipos-faqs.delete'
));
//crud faq
Route::resource('mantenedor-faqs','FaqController');
Route::delete('mantenedor-faqs/{idFaq}',array(
    'uses'=>'FaqController@destroy',
    'as'=>'mantenedor-faqs.delete'
));
//crud medios de pago
Route::resource('mantenedor-tipos-medios-pagos','TipoMedioPagoController');
Route::delete('mantenedor-tipos-medios-pagos/{idTipoMedioPago}',array(
    'uses'=>'TipoMedioPagoController@destroy',
    'as'=>'mantenedor-tipos-medios-pagos.delete'
));
//crud cambio dolar
Route::resource('mantenedor-cambio-dolar','CambioDolarController');
Route::delete('mantenedor-cambio-dolar/{idCambioDolar}',array(
    'uses'=>'CambioDolarController@destroy',
    'as'=>'mantenedor-cambio-dolar.delete'
));