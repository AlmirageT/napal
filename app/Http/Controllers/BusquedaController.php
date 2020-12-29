<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TrxDepositoTransferencia;
use App\TrxIngreso;
use App\TrxEgresos;
use App\DestinoEgreso;
use App\Usuario;
use App\Proyecto;
use App\Propiedad;
use App\CasoExitoso;
use App\Comuna;
use App\Provincia;
use App\Banco;
use App\BancoTipoCuenta;
use App\InstruccionBancaria;
use App\TipoCuenta;
use Session;

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
				->orderBy('idTrxIngreso','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$caracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
			$sinCaracteres = str_replace($caracteresEspeciales, " ", $search);
			$ingresos = TrxIngreso::select('*')
		    	->join('usuarios','trx_ingresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_ingresos.idMoneda','=','monedas.idMoneda')
		    	->join('estados','trx_ingresos.idEstado','=','estados.idEstado')
		    	->join('tipos_medios_pagos','trx_ingresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
		    	->whereRaw(" MATCH(usuarios.nombre) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.apellido) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.rut) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.correo) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(telefonos.numero) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
				->offset($start)
				->limit($limit)
				->orderBy('idTrxIngreso','DESC')
				->get();

			$totalFiltered = TrxIngreso::select('*')
		    	->join('usuarios','trx_ingresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_ingresos.idMoneda','=','monedas.idMoneda')
		    	->join('estados','trx_ingresos.idEstado','=','estados.idEstado')
		    	->join('tipos_medios_pagos','trx_ingresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
				->whereRaw(" MATCH(usuarios.nombre) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.apellido) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.rut) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.correo) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(telefonos.numero) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
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

		if(empty($request->input('search.value')))
		{
			$egresos = TrxEgresos::select('*')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
				->offset($start)
				->limit($limit)
				->orderBy('idTrxEgreso','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$caracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
			$sinCaracteres = str_replace($caracteresEspeciales, " ", $search);
			$egresos = TrxEgresos::select('*')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
		    	->whereRaw(" MATCH(usuarios.nombre) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.apellido) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.rut) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.correo) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(telefonos.numero) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
				->offset($start)
				->limit($limit)
				->orderBy('idTrxEgreso','DESC')
				->get();

			$totalFiltered = TrxEgresos::select('*')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
		    	->whereRaw(" MATCH(usuarios.nombre) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.apellido) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.rut) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.correo) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(telefonos.numero) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
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
				->orderBy('idDestinoEgreso','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$caracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
			$sinCaracteres = str_replace($caracteresEspeciales, " ", $search);
			$destinosEgresos = DestinoEgreso::select('*')
		    	->join('trx_egresos','destinos_egresos.idTrxEgreso','=','trx_egresos.idTrxEgreso')
		    	->join('tipos_medios_pagos','destinos_egresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('estados','destinos_egresos.idEstado','=','estados.idEstado')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
		    	->whereRaw(" MATCH(usuarios.nombre) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.apellido) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.rut) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.correo) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(telefonos.numero) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
				->offset($start)
				->limit($limit)
				->orderBy('idDestinoEgreso','DESC')
				->get();

			$totalFiltered = DestinoEgreso::select('*')
		    	->join('trx_egresos','destinos_egresos.idTrxEgreso','=','trx_egresos.idTrxEgreso')
		    	->join('tipos_medios_pagos','destinos_egresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
		    	->join('estados','destinos_egresos.idEstado','=','estados.idEstado')
		    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
		    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
		    	->whereRaw(" MATCH(usuarios.nombre) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.apellido) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.rut) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.correo) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(telefonos.numero) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
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
			4> 'activarCuenta',
			5=> 'activarNewsletter',
			6=> 'desactivarCuenta',
			7=> 'options'
		);
		$totalData = Usuario::select('*')
		        ->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$usuarios = Usuario::select('*')
				->offset($start)
				->limit($limit)
				->orderBy('idUsuario','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$caracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
			$sinCaracteres = str_replace($caracteresEspeciales, " ", $search);
			$usuarios = Usuario::select('*')
		    	->whereRaw(" MATCH(usuarios.nombre) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.apellido) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.rut) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.correo) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
				->offset($start)
				->limit($limit)
				->orderBy('idUsuario','DESC')
				->get();

			$totalFiltered = Usuario::select('*')
		    	->whereRaw(" MATCH(usuarios.nombre) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.apellido) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.rut) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
		    	->orWhereRaw(" MATCH(usuarios.correo) AGAINST('+".$sinCaracteres."' IN BOOLEAN MODE)")
				->count();
		}

		$data = array();
		if(!empty($usuarios)){
			foreach ($usuarios as $usuario){
				$nestedData['idUsuario'] = $usuario->idUsuario;
				$nestedData['nombre'] = $usuario->nombre." ".$usuario->apellido;
				$nestedData['rut'] = $usuario->rut;
				$nestedData['correo'] = $usuario->correo;
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
				->orderBy('propiedades.idPropiedad','DESC')
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
				->orderBy('propiedades.idPropiedad','DESC')
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
		                            <div class='dropdown-menu dropdown-menu-center'>
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
			2=> 'imagenCasoExito',
			3=> 'options'
		);
		$totalData = CasoExitoso::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$casosExitosos = CasoExitoso::select('*')
    			->join('propiedades','casos_exitosos.idPropiedad','=','propiedades.idPropiedad')
				->offset($start)
				->limit($limit)
				->orderBy('idCasoExitoso','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$casosExitosos = CasoExitoso::select('*')
    			->join('propiedades','casos_exitosos.idPropiedad','=','propiedades.idPropiedad')
		    	->where('propiedades.nombrePropiedad', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy('idCasoExitoso','DESC')
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
				if ($casoExitoso->imagenCasoExito != null) {
					$nestedData['imagenCasoExito'] = "<img src='".asset($casoExitoso->imagenCasoExito)."' width='100' height='100'>";
				}else{
					$nestedData['imagenCasoExito'] = "No tiene imagen";
				}
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu'>
		                            <a href='".asset('napalm/edit-casos-exitoso')."/".$casoExitoso->idCasoExitoso."' class='dropdown-item'>Editar</a>
		                            <a href='".asset('napalm/casos-exitosos/destroy')."/".$casoExitoso->idCasoExitoso."' class='dropdown-item'>Eliminar</a>
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

		if(empty($request->input('search.value')))
		{
			$comunas = Comuna::select('*')
		    	->join('provincias','comunas.idProvincia','=','provincias.idProvincia')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
				->offset($start)
				->limit($limit)
				->orderBy('idComuna','DESC')
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
				->orderBy('idComuna','DESC')
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
		                        <div class='dropdown-menu dropdown-menu-right'>
		                            <a class='dropdown-item' href='".asset('napalm/edit-comuna')."/".$comuna->idComuna."'>Editar</a>
		                            <a class='dropdown-item' href='".asset('napalm/destroy-comuna')."/".$comuna->idComuna."'>Eliminar</a>
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
    public function tablaProvincias(Request $request)
    {
    	$columns = array(
			0=> 'idProvincia',
			1=> 'nombreProvincia',
			2=> 'nombreRegion',
			3=> 'nombrePais',
			5=> 'options'
		);
		$totalData = Provincia::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$provincias = Provincia::select('*')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
				->offset($start)
				->limit($limit)
				->orderBy('idProvincia','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$provincias = Provincia::select('*')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
		    	->where('provincias.nombreProvincia', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy('idProvincia','DESC')
				->get();

			$totalFiltered = Provincia::select('*')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
		    	->where('provincias.nombreProvincia', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($provincias)){
			foreach ($provincias as $provincia){
				$nestedData['idProvincia'] = $provincia->idProvincia;
				$nestedData['nombreProvincia'] = $provincia->nombreProvincia;
				$nestedData['nombreRegion'] = $provincia->nombreRegion;
				$nestedData['nombrePais'] = $provincia->nombrePais;
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu'>
		                            <a class='dropdown-item' href='".asset('napalm/edit-provincia')."/".$provincia->idProvincia."'>Editar</a>
		                            <a class='dropdown-item' href='".asset('napalm/destroy-provincia')."/".$provincia->idProvincia."'>Eliminar</a>
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
    public function tablaUsuarioTransferencia(Request $request)
    {
    	$columns = array(
			0=> 'tokenCorto',
			1=> 'nombre',
			2=> 'rut',
			3=> 'correo',
			4=> 'options'
		);
		$totalData = Usuario::select('*')
		        ->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$usuarios = Usuario::select('*')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$usuarios = Usuario::select('*')
		    	->where('tokenCorto',$search)
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = Usuario::select('*')
		        ->where('tokenCorto',$search)
				->count();
		}

		$data = array();
		if(!empty($usuarios)){
			foreach ($usuarios as $usuario){
				$nestedData['tokenCorto'] = $usuario->tokenCorto;
				$nestedData['nombre'] = $usuario->nombre." ".$usuario->apellido;
				$nestedData['rut'] = $usuario->rut;
				$nestedData['correo'] = $usuario->correo;
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-right'>
		                        	<a href='".asset('napalm/usuarios')."/".$usuario->idUsuario."/listado-trasferencias' class='dropdown-item btn btn-info'>Validar Transferencia</a>
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
    public function transferenciaUsuarioTabla(Request $request, $idUsuario)
    {
    	$columns = array(
			0=> 'idTrxDepoTransf',
			1=> 'nombreBancoOrigen',
			2=> 'numeroOperacion',
			3=> 'bancoOrigen',
			4=> 'montoDeposito',
			5=> 'fechaDeposito',
			6=> 'numeroCuentaBanco',
			7=> 'correo',
			8=> 'validado',
			9=> 'rutaImagen',
			10=> 'options'
		);
		$totalData = TrxDepositoTransferencia::select('*')
				->where('idUsuario',$idUsuario)
		        ->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$transferencias = TrxDepositoTransferencia::select('*')
				->where('idUsuario',$idUsuario)
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$transferencias = TrxDepositoTransferencia::select('*')
				->where('idUsuario',$idUsuario)
				->where('numeroOperacion',$search)
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = TrxDepositoTransferencia::select('*')
				->where('idUsuario',$idUsuario)
				->where('numeroOperacion',$search)
				->count();
		}

		$data = array();
		if(!empty($transferencias)){
			foreach ($transferencias as $transferencia){
				$nestedData['idTrxDepoTransf'] = $transferencia->idTrxDepoTransf;
				$nestedData['nombreBancoOrigen'] = $transferencia->nombreBancoOrigen;
				$nestedData['numeroOperacion'] = $transferencia->numeroOperacion;
				$nestedData['bancoOrigen'] = $transferencia->bancoOrigen;
				$nestedData['montoDeposito'] = "$".number_format($transferencia->montoDeposito,0,',','.');
				$nestedData['fechaDeposito'] = $transferencia->fechaDeposito;
				$nestedData['numeroCuentaBanco'] = $transferencia->numeroCuentaBanco;
				$nestedData['correo'] = $transferencia->correo;
				if ($transferencia->validado == 1) {
					$nestedData['validado'] = "Validado";
				}else{
					$nestedData['validado'] = "No Validado";
				}
				$nestedData['rutaImagen'] = "<img src='".asset($transferencia->rutaImagen)."' width='100' height='100'>";
				if (Session::get('idTipoUsuario') == 10) {
					$nestedData['options'] = "<div class='dropdown'>
			                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
			                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
			                        </a>
			                        <div href='' class='dropdown-menu dropdown-menu-right'>
			                        	<a href='".asset('napalm/usuarios')."/".$transferencia->idTrxDepoTransf."/".$idUsuario."/editar-transferencia' class='dropdown-item btn btn-info'>Editar</a>
			                        	<a href='".asset('napalm/usuarios')."/".$transferencia->idTrxDepoTransf."/".$idUsuario."/eliminar-transferencia' class='dropdown-item btn btn-info'>Elimnar</a>
			                        </div>
			                    </div>";
				}else{
					$nestedData['options'] = "<div class='dropdown'>
			                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
			                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
			                        </a>
			                        <div href='' class='dropdown-menu dropdown-menu-right'>
			                        	<a href='".asset('napalm/usuarios')."/".$transferencia->idTrxDepoTransf."/".$idUsuario."/editar-transferencia' class='dropdown-item btn btn-info'>Detalles</a>
			                        </div>
			                    </div>";
				}

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
    public function bancoPorPais($idPais)
    {
    	$bancos = Banco::where('idPais',$idPais)->get();
    	return response()->json($bancos);
    }
    public function tipoCuentaPorBanco($idBanco)
    {
    	$asociacion = BancoTipoCuenta::where('idBanco',$idBanco)->pluck('idTipoCuenta');
    	$tiposCuentas = TipoCuenta::whereIn('idTipoCuenta',$asociacion)->get();
    	return response()->json($tiposCuentas);
    }
    public function tablaRetiroFondos(Request $request)
    {
    	$columns = array(
			0=> 'idIntruccionBancaria',
			1=> 'concepto',
			2=> 'importe',
			3=> 'nombre',
			4=> 'validado',
			5=> 'nombreBanco',
			6=> 'nombreTipoCuenta',
			7=> 'numeroCuenta',
			8=> 'options'
		);
		$totalData = InstruccionBancaria::select('*')
			  	->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
			  	->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
			  	->join('bancos','cuentas_bancarias_usuarios.idBanco','=','bancos.idBanco')
			  	->join('tipos_cuentas','cuentas_bancarias_usuarios.idTipoCuenta','=','tipos_cuentas.idTipoCuenta')
		        ->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$instruccionesBancarias = InstruccionBancaria::select('*')
			  	->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
			  	->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
			  	->join('bancos','cuentas_bancarias_usuarios.idBanco','=','bancos.idBanco')
			  	->join('tipos_cuentas','cuentas_bancarias_usuarios.idTipoCuenta','=','tipos_cuentas.idTipoCuenta')
				->offset($start)
				->limit($limit)
				->orderBy('instrucciones_bancarias.idIntruccionBancaria','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$instruccionesBancarias = InstruccionBancaria::select('*')
			  	->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
			  	->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
			  	->join('bancos','cuentas_bancarias_usuarios.idBanco','=','bancos.idBanco')
			  	->join('tipos_cuentas','cuentas_bancarias_usuarios.idTipoCuenta','=','tipos_cuentas.idTipoCuenta')
				->where('cuentas_bancarias_usuarios.numeroCuenta',$search)
				->offset($start)
				->limit($limit)
				->orderBy('instrucciones_bancarias.idIntruccionBancaria','DESC')
				->get();

			$totalFiltered = InstruccionBancaria::select('*')
			  	->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
			  	->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
			  	->join('bancos','cuentas_bancarias_usuarios.idBanco','=','bancos.idBanco')
			  	->join('tipos_cuentas','cuentas_bancarias_usuarios.idTipoCuenta','=','tipos_cuentas.idTipoCuenta')
				->where('cuentas_bancarias_usuarios.numeroCuenta',$search)
				->count();
		}

		$data = array();
		if(!empty($instruccionesBancarias)){
			foreach ($instruccionesBancarias as $instruccionBancaria){
				$nestedData['idIntruccionBancaria'] = $instruccionBancaria->idIntruccionBancaria;
				$nestedData['concepto'] = $instruccionBancaria->concepto;
				$nestedData['importe'] = $instruccionBancaria->importe;
				$nestedData['nombre'] = $instruccionBancaria->nombre.' '.$instruccionBancaria->apellido;
				if ($instruccionBancaria->validado == 1) {
					$nestedData['validado'] = "Validado";
				}else{
					$nestedData['validado'] = "No Validado";
				}
				$nestedData['nombreBanco'] = $instruccionBancaria->nombreBanco;
				$nestedData['nombreTipoCuenta'] = $instruccionBancaria->nombreTipoCuenta;
				$nestedData['numeroCuenta'] = $instruccionBancaria->numeroCuenta;
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div href='' class='dropdown-menu dropdown-menu-right'>
		                        	<a href='".asset('napalm/validar-transferencia')."/".$instruccionBancaria->idIntruccionBancaria."' class='dropdown-item'> Validar Transferencia</a>
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
