<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TrxIngreso;
use App\TrxEgresos;
use App\DestinoEgreso;
use App\Usuario;
use App\Proyecto;
use App\Propiedad;
use App\CasoExitoso;
use App\Comuna;

class BusquedaController extends Controller
{
    public function tablaIngresos(Request $request)
    {
    	$columns = array(
			0=> 'idTrxIngreso',
			1=> 'monto',
			2=> 'webClient',
			3=> 'nombre',
			4=> 'rut',
			5=> 'correo',
			6=> 'numero',
			7=> 'nombreEstado',
			8=> 'nombreTipoMedioPago',
			9=> 'options'
		);
		$totalData = TrxIngreso::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$ingresos = TrxIngreso::select('*')
		    	->join('usuarios','trx_ingresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_ingresos.idMoneda','=','monedas.idMoneda')
		    	->join('estados','trx_ingresos.idEstado','=','estados.idEstado')
		    	->join('tipos_medios_pagos','trx_ingresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$ingresos = TrxIngreso::select('*')
		    	->join('usuarios','trx_ingresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_ingresos.idMoneda','=','monedas.idMoneda')
		    	->join('estados','trx_ingresos.idEstado','=','estados.idEstado')
		    	->join('tipos_medios_pagos','trx_ingresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
				->where('usuarios.nombre', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
		    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = TrxIngreso::select('*')
		    	->join('usuarios','trx_ingresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_ingresos.idMoneda','=','monedas.idMoneda')
		    	->join('estados','trx_ingresos.idEstado','=','estados.idEstado')
		    	->join('tipos_medios_pagos','trx_ingresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
				->where('usuarios.nombre', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
		    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($ingresos)){
			foreach ($ingresos as $ingreso){
				$nestedData['idTrxIngreso'] = $ingreso->idTrxIngreso;
				$nestedData['monto'] ="$".number_format($ingreso->monto,0,',','.');
				$nestedData['webClient'] = $ingreso->webClient;
				$nestedData['nombre'] = $ingreso->nombre." ".$ingreso->apellido;
				$nestedData['rut'] = $ingreso->rut;
				$nestedData['correo'] = $ingreso->correo;
				$nestedData['numero'] = $ingreso->numero;
				$nestedData['nombreEstado'] = $ingreso->nombreEstado;
				$nestedData['nombreTipoMedioPago'] = $ingreso->nombreTipoMedioPago;
				$nestedData['options'] = "<div class='dropdown'>
	                                <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
	                                    <i class='mdi mdi-dots-horizontal font-size-18'></i>
	                                </a>
	                                <div class='dropdown-menu dropdown-menu-right'>
						      			<a href='".asset('napalm/ingresos/detalles')."/".$ingreso->idTrxIngreso."' class='dropdown-item btn btn-warning'>Ver Detalles</a>
	                                </div>
	                            </div>";
				$data[] = $nestedData;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		echo json_encode($json_data);
    }
    public function tablaEgresos(Request $request)
    {
    	$columns = array(
			0=> 'idTrxEgreso',
			1=> 'monto',
			2=> 'webClient',
			3=> 'nombre',
			4=> 'rut',
			5=> 'correo',
			6=> 'numero',
			7=> 'nombreMoneda',
			8=> 'options'
		);
		$totalData = TrxEgresos::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$egresos = TrxEgresos::select('*')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$egresos = TrxEgresos::select('*')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
		    	->where('usuarios.nombre', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
		    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = TrxEgresos::select('*')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
		    	->where('usuarios.nombre', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
		    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($egresos)){
			foreach ($egresos as $egreso){
				$nestedData['idTrxEgreso'] = $egreso->idTrxEgreso;
				$nestedData['monto'] ="$".number_format($egreso->monto,0,',','.');
				$nestedData['webClient'] = $egreso->webClient;
				$nestedData['nombre'] = $egreso->nombre." ".$egreso->apellido;
				$nestedData['rut'] = $egreso->rut;
				$nestedData['correo'] = $egreso->correo;
				$nestedData['numero'] = $egreso->numero;
				$nestedData['nombreMoneda'] = $egreso->nombreMoneda;
				$nestedData['options'] = "<div class='dropdown'>
                                <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
                                    <i class='mdi mdi-dots-horizontal font-size-18'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu'>
					      			<a href='".asset('napalm/egresos/detalles')."/".$egreso->idTrxEgreso."' class='dropdown-item btn btn-warning'>Ver Detalles</a>
                                </div>
                            </div>";
				$data[] = $nestedData;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		echo json_encode($json_data);
    }
    public function tablaDestinoEgreso(Request $request)
    {
    	$columns = array(
			0=> 'idDestinoEgreso',
			1=> 'monto',
			2=> 'idTipoMedioPago',
			3=> 'nombre',
			4=> 'rut',
			5=> 'correo',
			6=> 'numero',
			7=> 'idEstado',
			8=> 'nombreBanco',
			9=> 'nombreDestinatario',
			10=> 'codigoSwift',
			11=> 'numeroCuenta',
			12=> 'notas',
			13=> 'options'
		);
		$totalData = DestinoEgreso::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$destinosEgresos = DestinoEgreso::select('*')
		    	->join('trx_egresos','destinos_egresos.idTrxEgreso','=','trx_egresos.idTrxEgreso')
		    	->join('tipos_medios_pagos','destinos_egresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('estados','destinos_egresos.idEstado','=','estados.idEstado')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$destinosEgresos = DestinoEgreso::select('*')
		    	->join('trx_egresos','destinos_egresos.idTrxEgreso','=','trx_egresos.idTrxEgreso')
		    	->join('tipos_medios_pagos','destinos_egresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('estados','destinos_egresos.idEstado','=','estados.idEstado')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
		    	->where('usuarios.nombre', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
		    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = DestinoEgreso::select('*')
		    	->join('trx_egresos','destinos_egresos.idTrxEgreso','=','trx_egresos.idTrxEgreso')
		    	->join('tipos_medios_pagos','destinos_egresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('estados','destinos_egresos.idEstado','=','estados.idEstado')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
		    	->where('usuarios.nombre', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
		    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($destinosEgresos)){
			foreach ($destinosEgresos as $destinoEgreso){
				$nestedData['idDestinoEgreso'] = $destinoEgreso->idDestinoEgreso;
				$nestedData['monto'] ="$".number_format($destinoEgreso->monto,0,',','.');
				$nestedData['idTipoMedioPago'] = $destinoEgreso->nombreTipoMedioPago;
				$nestedData['nombre'] = $destinoEgreso->nombre." ".$destinoEgreso->apellido;
				$nestedData['rut'] = $destinoEgreso->rut;
				$nestedData['correo'] = $destinoEgreso->correo;
				$nestedData['numero'] = $destinoEgreso->numero;
				$nestedData['idEstado'] = $destinoEgreso->nombreEstado;
				$nestedData['nombreBanco'] = $destinoEgreso->nombreBanco;
				$nestedData['nombreDestinatario'] = $destinoEgreso->nombreDestinatario;
				$nestedData['codigoSwift'] = $destinoEgreso->codigoSwift;
				$nestedData['numeroCuenta'] = $destinoEgreso->numeroCuenta;
				$nestedData['notas'] = $destinoEgreso->notas;
				$nestedData['options'] = "<div class='dropdown'>
                                <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
                                    <i class='mdi mdi-dots-horizontal font-size-18'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu'>
					      			<a href='".asset('napalm/destinos-egresos/detalles')."/".$destinoEgreso->idDestinoEgreso."' class='dropdown-item btn btn-warning'>Ver Detalles</a>
                                </div>
                            </div>";
				$data[] = $nestedData;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		echo json_encode($json_data);
    }
    public function tablaUsuario(Request $request)
    {
    	$columns = array(
			0=> 'idUsuario',
			1=> 'nombre',
			2=> 'rut',
			3=> 'correo',
			4=> 'profesion',
			5=> 'nombreIdioma',
			6=> 'nombreTipoPersona',
			7=> 'rutaAvatar',
			8=> 'activarCuenta',
			9=> 'activarNewsletter',
			10=> 'desactivarCuenta',
			11=> 'options'
		);
		$totalData = Usuario::select('*')
		        ->join('idiomas','usuarios.idIdioma','=','idiomas.idIdioma')
		        ->join('avatares','usuarios.idAvatar','=','avatares.idAvatar')
		        ->join('tipo_personas','usuarios.idTipoPersona','=','tipo_personas.idTipoPersona')
		        ->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$usuarios = Usuario::select('*')
		        ->join('idiomas','usuarios.idIdioma','=','idiomas.idIdioma')
		        ->join('avatares','usuarios.idAvatar','=','avatares.idAvatar')
		        ->join('tipo_personas','usuarios.idTipoPersona','=','tipo_personas.idTipoPersona')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$usuarios = Usuario::select('*')
		        ->join('idiomas','usuarios.idIdioma','=','idiomas.idIdioma')
		        ->join('avatares','usuarios.idAvatar','=','avatares.idAvatar')
		        ->join('tipo_personas','usuarios.idTipoPersona','=','tipo_personas.idTipoPersona')
		    	->where('usuarios.nombre', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
		    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = Usuario::select('*')
		        ->join('idiomas','usuarios.idIdioma','=','idiomas.idIdioma')
		        ->join('avatares','usuarios.idAvatar','=','avatares.idAvatar')
		        ->join('tipo_personas','usuarios.idTipoPersona','=','tipo_personas.idTipoPersona')
		    	->where('usuarios.nombre', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
		    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($usuarios)){
			foreach ($usuarios as $usuario){
				$nestedData['idUsuario'] = $usuario->idUsuario;
				$nestedData['nombre'] = $usuario->nombre." ".$usuario->apellido;
				$nestedData['rut'] = $usuario->rut;
				$nestedData['correo'] = $usuario->correo;
				$nestedData['profesion'] = $usuario->profesion;
				$nestedData['nombreIdioma'] = $usuario->nombreIdioma;
				$nestedData['nombreTipoPersona'] = $usuario->nombreTipoPersona;
				if ($usuario->idAvatar != null) {
					$nestedData['rutaAvatar'] = "<img src='".asset($usuario->rutaAvatar)."' width='100' height='100'>";
				}else{
					$nestedData['rutaAvatar'] = "No tiene imagen";
				}
				if ($usuario->activarCuenta == 0) {
					$nestedData['activarCuenta'] = "Esta cuenta aun no se activa";
				}else{
					$nestedData['activarCuenta'] = "Cuenta Activada";
				}
				if ($usuario->activarNewsletter == 0) {
					$nestedData['activarNewsletter'] = "Sin Newsletter";
				}else{
					$nestedData['activarNewsletter'] = "Con Newsletter";
				}
				if ($usuario->desactivarCuenta == 0) {
					$nestedData['desactivarCuenta'] = "No";
				}else{
					$nestedData['desactivarCuenta'] = "Si";
				}
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-right'>
		                        	<a href='".asset('napalm/usuarios/editar')."/".$usuario->idUsuario."' class='dropdown-item btn btn-info'>Editar</a>
		                        	<a href='".asset('napalm/usuarios/delete')."/".$usuario->idUsuario."' class='dropdown-item btn btn-info'>Eliminar</a>
		                			<a href='".asset('napalm/usuarios/telefonos')."/".$usuario->idUsuario."' class='dropdown-item btn btn-info'>Telefonos</a>
		                        </div>
		                    </div>";
				$data[] = $nestedData;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		echo json_encode($json_data);
    }
    public function tablaProyecto(Request $request)
    {
    	$columns = array(
			0=> 'idProyecto',
			1=> 'nombreProyecto',
			2=> 'nombrePais',
			3=> 'nombreRegion',
			4=> 'nombreProvincia',
			5=> 'nombreComuna',
			6=> 'direccion',
			7=> 'codigoPostal',
			8=> 'fotoPortada',
			9=> 'options'
		);
		$totalData = Proyecto::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$proyectos = Proyecto::select('*')
		        ->join('paises','proyectos.idPais','=','paises.idPais')
		        ->join('regiones','proyectos.idRegion','=','regiones.idRegion')
		        ->join('provincias','proyectos.idProvincia','=','provincias.idProvincia')
		        ->join('comunas','proyectos.idComuna','=','comunas.idComuna')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$proyectos = Proyecto::select('*')
		        ->join('paises','proyectos.idPais','=','paises.idPais')
		        ->join('regiones','proyectos.idRegion','=','regiones.idRegion')
		        ->join('provincias','proyectos.idProvincia','=','provincias.idProvincia')
		        ->join('comunas','proyectos.idComuna','=','comunas.idComuna')
		    	->where('proyectos.nombreProyecto', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = Proyecto::select('*')
		        ->join('paises','proyectos.idPais','=','paises.idPais')
		        ->join('regiones','proyectos.idRegion','=','regiones.idRegion')
		        ->join('provincias','proyectos.idProvincia','=','provincias.idProvincia')
		        ->join('comunas','proyectos.idComuna','=','comunas.idComuna')
		    	->where('proyectos.nombreProyecto', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($proyectos)){
			foreach ($proyectos as $proyecto){
				$nestedData['idProyecto'] = $proyecto->idProyecto;
				$nestedData['nombreProyecto'] = $proyecto->nombreProyecto;
				$nestedData['nombrePais'] = $proyecto->nombrePais;
				$nestedData['nombreRegion'] = $proyecto->nombreRegion;
				$nestedData['nombreProvincia'] = $proyecto->nombreProvincia;
				$nestedData['nombreComuna'] = $proyecto->nombreComuna;
				$nestedData['direccion'] = $proyecto->direccion;
				$nestedData['codigoPostal'] = $proyecto->codigoPostal;
				if ($proyecto->fotoPortada != null) {
					$nestedData['fotoPortada'] = "<img src='".asset($proyecto->fotoPortada)."' width='100' height='100'>";
				}else{
					$nestedData['fotoPortada'] = "No tiene foto";
				}
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-right'>
					      			<a href='".asset('napalm/proyectos/editar')."/".$proyecto->idProyecto."' class='dropdown-item btn btn-info'>Editar</a>
					      			<a href='".asset('napalm/proyectos/destroy')."/".$proyecto->idProyecto."' class='dropdown-item btn btn-info'>Eliminar</a>
		                        </div>
		                    </div>";
				$data[] = $nestedData;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		echo json_encode($json_data);
    }
    public function tablaPropiedad(Request $request)
    {
    	$columns = array(
			0=> 'idPropiedad',
			1=> 'nombrePropiedad',
			2=> 'nombrePais',
			3=> 'nombreRegion',
			4=> 'nombreProvincia',
			5=> 'nombreComuna',
			6=> 'direccion',
			7=> 'codigoPostal',
			8=> 'fotoPrincipal',
			9=> 'fotoMapa',
			10=> 'cantidadSubPropiedad',
			11=> 'nombreTipoInversion',
			12=> 'nombreProyecto',
			13=> 'nombreTipoFlexibilidad',
			14=> 'nombreTipoCredito',
			15=> 'tieneChat',
			16=> 'nombreTipoCalidad',
			17=> 'nombreEstado',
			18=> 'precio',
			19=> 'nombreMoneda',
			20=> 'plazoMeses',
			21=> 'rentabilidadAnual',
			22=> 'rentabilidadTotal',
			23=> 'options'
		);
		$totalData = Propiedad::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$propiedades = Propiedad::select('*')
		    	->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
		    	->join('paises','propiedades.idPais','=','paises.idPais')
		    	->join('regiones','propiedades.idRegion','=','regiones.idRegion')
		    	->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
		    	->join('comunas','propiedades.idComuna','=','comunas.idComuna')
		    	->join('estados','propiedades.idEstado','=','estados.idEstado')
		    	->join('monedas','propiedades.idMoneda','=','monedas.idMoneda')
		    	->join('tipos_creditos','propiedades.idTipoCredito','=','tipos_creditos.idTipoCredito')
		    	->join('tipos_calidades','propiedades.idTipoCalidad','=','tipos_calidades.idTipoCalidad')
		    	->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
		    	->join('proyectos','propiedades.idProyecto','=','proyectos.idProyecto')
		    	->join('tipo_inversiones','propiedades.idTipoInversion','=','tipo_inversiones.idTipoInversion')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$propiedades = Propiedad::select('*')
		    	->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
		    	->join('paises','propiedades.idPais','=','paises.idPais')
		    	->join('regiones','propiedades.idRegion','=','regiones.idRegion')
		    	->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
		    	->join('comunas','propiedades.idComuna','=','comunas.idComuna')
		    	->join('estados','propiedades.idEstado','=','estados.idEstado')
		    	->join('monedas','propiedades.idMoneda','=','monedas.idMoneda')
		    	->join('tipos_creditos','propiedades.idTipoCredito','=','tipos_creditos.idTipoCredito')
		    	->join('tipos_calidades','propiedades.idTipoCalidad','=','tipos_calidades.idTipoCalidad')
		    	->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
		    	->join('proyectos','propiedades.idProyecto','=','proyectos.idProyecto')
		    	->join('tipo_inversiones','propiedades.idTipoInversion','=','tipo_inversiones.idTipoInversion')
		    	->where('propiedades.nombrePropiedad', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = Propiedad::select('*')
		    	->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
		    	->join('paises','propiedades.idPais','=','paises.idPais')
		    	->join('regiones','propiedades.idRegion','=','regiones.idRegion')
		    	->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
		    	->join('comunas','propiedades.idComuna','=','comunas.idComuna')
		    	->join('estados','propiedades.idEstado','=','estados.idEstado')
		    	->join('monedas','propiedades.idMoneda','=','monedas.idMoneda')
		    	->join('tipos_creditos','propiedades.idTipoCredito','=','tipos_creditos.idTipoCredito')
		    	->join('tipos_calidades','propiedades.idTipoCalidad','=','tipos_calidades.idTipoCalidad')
		    	->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
		    	->join('proyectos','propiedades.idProyecto','=','proyectos.idProyecto')
		    	->join('tipo_inversiones','propiedades.idTipoInversion','=','tipo_inversiones.idTipoInversion')
		    	->where('propiedades.nombrePropiedad', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($propiedades)){
			foreach ($propiedades as $propiedad){
				$nestedData['idPropiedad'] = $propiedad->idPropiedad;
				$nestedData['nombrePropiedad'] = $propiedad->nombrePropiedad;
				$nestedData['nombrePais'] = $propiedad->nombrePais;
				$nestedData['nombreRegion'] = $propiedad->nombreRegion;
				$nestedData['nombreProvincia'] = $propiedad->nombreProvincia;
				$nestedData['nombreComuna'] = $propiedad->nombreComuna;
				$nestedData['direccion'] = $propiedad->direccion1." ".$propiedad->direccion2;
				$nestedData['codigoPostal'] = $propiedad->codigoPostal;
				if ($propiedad->fotoPrincipal != null) {
					$nestedData['fotoPrincipal'] = "<img src='".asset($propiedad->fotoPrincipal)."' width='100' height='100'>";
				}else{
					$nestedData['fotoPrincipal'] = "No tiene imagen";
				}
				if ($propiedad->fotoMapa != null) {
					$nestedData['fotoMapa'] = "<img src='".asset($propiedad->fotoMapa)."' width='100' height='100'>";
				}else{
					$nestedData['fotoMapa'] = "No tiene mapa";
				}
				$nestedData['cantidadSubPropiedad'] = $propiedad->cantidadSubPropiedad;
				$nestedData['nombreTipoInversion'] = $propiedad->nombreTipoInversion;
				$nestedData['nombreProyecto'] = $propiedad->nombreProyecto;
				$nestedData['nombreTipoFlexibilidad'] = $propiedad->nombreTipoFlexibilidad;
				$nestedData['nombreTipoCredito'] = $propiedad->nombreTipoCredito;
				if ($propiedad->tieneChat == 1) {
					$nestedData['tieneChat'] = "Si";
				}else{
					$nestedData['tieneChat'] = "No";
				}
				$nestedData['nombreTipoCalidad'] = $propiedad->nombreTipoCalidad;
				$nestedData['nombreEstado'] = $propiedad->nombreEstado;
				$nestedData['precio'] = "$".number_format($propiedad->precio,0,',','.');
				$nestedData['nombreMoneda'] = $propiedad->nombreMoneda;
				$nestedData['plazoMeses'] = $propiedad->plazoMeses;
				$nestedData['rentabilidadAnual'] = $propiedad->rentabilidadAnual."%";
				$nestedData['rentabilidadTotal'] = $propiedad->rentabilidadTotal."%";
				$nestedData['options'] = "<div class='dropdown'>
		                            <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                                <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                            </a>
		                            <div class='dropdown-menu dropdown-menu-right'>
						      			<a href='".asset('napalm/propiedades/editar')."/".$propiedad->idPropiedad."' class='dropdown-item btn btn-info'>Editar</a>
		                    			<a href='".asset('napalm/subir-documentos/create')."/".$propiedad->idPropiedad."' class='dropdown-item'>Documentos</a>
		                    			<a href='".asset('napalm/propiedades/destroy')."/".$propiedad->idPropiedad."' class='dropdown-item'>Eliminar</a>
		                    			<a href='".asset('napalm/imagenes')."/".$propiedad->idPropiedad."/create' class='dropdown-item'>Imagenes Propiedad</a>
		                    			<a href='".asset('napalm/planos')."/".$propiedad->idPropiedad."/create' class='dropdown-item'>Imagenes Planos</a>
		                            </div>
		                        </div>";
				$data[] = $nestedData;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		echo json_encode($json_data);
    }
    public function tablaCasosExitosos(Request $request)
    {
    	$columns = array(
			0=> 'idCasoExitoso',
			1=> 'nombrePropiedad',
			2=> 'options'
		);
		$totalData = CasoExitoso::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$casosExitosos = CasoExitoso::select('*')
    			->join('propiedades','casos_exitosos.idPropiedad','=','propiedades.idPropiedad')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$casosExitosos = CasoExitoso::select('*')
    			->join('propiedades','casos_exitosos.idPropiedad','=','propiedades.idPropiedad')
		    	->where('propiedades.nombrePropiedad', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = CasoExitoso::select('*')
    			->join('propiedades','casos_exitosos.idPropiedad','=','propiedades.idPropiedad')
		    	->where('propiedades.nombrePropiedad', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($casosExitosos)){
			foreach ($casosExitosos as $casoExitoso){
				$nestedData['idCasoExitoso'] = $casoExitoso->idCasoExitoso;
				$nestedData['nombrePropiedad'] = $casoExitoso->nombrePropiedad;
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu'>
		                            <a class='dropdown-item btn btn-warning' data-toggle='modal' data-target='#edit{{ $casoExitoso->idCasoExitoso }}'>Editar</a>
		                            @include('admin.casosExitosos.destroy')
		                        </div>
		                    </div>";
				$data[] = $nestedData;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		echo json_encode($json_data);
    }
    public function tablaComunas(Request $request)
    {
    	$columns = array(
			0=> 'idComuna',
			1=> 'nombreComuna',
			2=> 'nombreProvincia',
			3=> 'nombreRegion',
			4=> 'nombrePais',
			5=> 'options'
		);
		$totalData = Comuna::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$comunas = Comuna::select('*')
		    	->join('provincias','comunas.idProvincia','=','provincias.idProvincia')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$comunas = Comuna::select('*')
		    	->join('provincias','comunas.idProvincia','=','provincias.idProvincia')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
		    	->where('comunas.nombreComuna', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = Comuna::select('*')
		    	->join('provincias','comunas.idProvincia','=','provincias.idProvincia')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
		    	->where('comunas.nombreComuna', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($comunas)){
			foreach ($comunas as $comuna){
				$nestedData['idComuna'] = $comuna->idComuna;
				$nestedData['nombreComuna'] = $comuna->nombreComuna;
				$nestedData['nombreProvincia'] = $comuna->nombreProvincia;
				$nestedData['nombreRegion'] = $comuna->nombreRegion;
				$nestedData['nombrePais'] = $comuna->nombrePais;
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu'>
		                            <a class='dropdown-item btn btn-warning' data-toggle='modal' data-target='#edit{{ $comuna->idComuna }}'>Editar</a>
		                            @include('admin.ubicaciones.comunas.destroy')
		                        </div>
		                    </div>";
				$data[] = $nestedData;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		echo json_encode($json_data);
    }
}
