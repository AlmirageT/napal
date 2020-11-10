<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TrxIngreso;
use App\TrxEgresos;
use App\DestinoEgreso;

class BusquedaController extends Controller
{
    public function busqueda_ingresos(Request $request)
    {
    	$ingresos = TrxIngreso::select('*')
    	->join('usuarios','trx_ingresos.idUsuario','=','usuarios.idUsuario')
    	->join('monedas','trx_ingresos.idMoneda','=','monedas.idMoneda')
    	->join('estados','trx_ingresos.idEstado','=','estados.idEstado')
    	->join('tipos_medios_pagos','trx_ingresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
    	->where('usuarios.nombre', 'like', $request->consulta.'%')
    	->orWhere('usuarios.apellido', 'like', $request->consulta.'%')
    	->orWhere('usuarios.rut', 'like', $request->consulta.'%')
    	->orWhere('usuarios.correo', 'like', $request->consulta.'%')
    	->orWhere('telefonos.numero', 'like', $request->consulta.'%')
    	->get();
    	if (count($ingresos)>0) {
	    	$tabla = "<table class='table project-list-table table-nowrap table-centered table-borderless' id='datos'>
					  <thead>
					    <tr>
				          <th>ID</th>
					      <th>Monto</th>
					      <th>webClient</th>
					      <th>Nombre Usuario</th>
					      <th>Rut</th>
					      <th>Correo</th>
					      <th>Télefono</th>
					      <th>Moneda</th>
					      <th>Estado</th>
					      <th>Medio Pago</th>
					      <th>Acciones</th>
					    </tr>
					  </thead>
					  <tbody>";
			foreach($ingresos as $ingreso){
				$tabla .= "<tr>
						      <td>".$ingreso->idTrxIngreso."</td>
						      <td> $".number_format($ingreso->monto,0,',','.')."</td>
						      <td>".$ingreso->webClient."</td>
						      <td>".$ingreso->nombre." ".$ingreso->apellido."</td>
						      <td>".$ingreso->rut."</td>
						      <td>".$ingreso->correo."</td>
						      <td>".$ingreso->numero."</td>
						      <td>".$ingreso->nombreMoneda."</td>
						      <td>".$ingreso->nombreEstado."</td>
						      <td>".$ingreso->nombreTipoMedioPago."</td>
						      <td>
						      	<div class='dropdown'>
	                                <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
	                                    <i class='mdi mdi-dots-horizontal font-size-18'></i>
	                                </a>
	                                <div class='dropdown-menu dropdown-menu'>
						      			<a href='".asset('napalm/ingresos/detalles')."/".$ingreso->idTrxIngreso."' class='dropdown-item btn btn-warning'>Ver Detalles</a>
	                                </div>
	                            </div>
						      </td>
						    </tr>";
			}
			$tabla .= "</tbody>
					</table>";
		}else{
			$tabla = "no hay datos";
		}
    	return $tabla;
    }

    public function busqueda_egresos(Request $request)
    {
    	$egresos = TrxEgresos::select('*')
    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
    	->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
    	->where('usuarios.nombre', 'like', $request->consulta.'%')
    	->orWhere('usuarios.apellido', 'like', $request->consulta.'%')
    	->orWhere('usuarios.rut', 'like', $request->consulta.'%')
    	->orWhere('usuarios.correo', 'like', $request->consulta.'%')
    	->orWhere('telefonos.numero', 'like', $request->consulta.'%')
    	->get();
    	if (count($egresos)>0) {
    		$tabla = "<table class='table project-list-table table-nowrap table-centered table-borderless' id='datos'>
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Monto</th>
				      <th>webClient</th>
				      <th>Nombre Usuario</th>
				      <th>Rut</th>
				      <th>Correo</th>
				      <th>Télefono</th>
				      <th>Moneda</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>";
			foreach ($egresos as $egreso) {
				$tabla .= "<tr>
					      <td>".$egreso->idTrxEgreso."</td>
					      <td>$".number_format($egreso->monto,0,',','.')."</td>
					      <td>".$egreso->webClient."</td>
					      <td>".$egreso->nombre." ".$egreso->apellido."</td>
					      <td>".$egreso->rut."</td>
					      <td>".$egreso->correo."</td>
					      <td>".$egreso->numero."</td>
					      <td>".$egreso->nombreMoneda."</td>
					      <td>
					      	<div class='dropdown'>
                                <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
                                    <i class='mdi mdi-dots-horizontal font-size-18'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu'>
					      			<a href='".asset('napalm/egresos/detalles')."/".$egreso->idTrxEgreso."' class='dropdown-item btn btn-warning'>Ver Detalles</a>
                                </div>
                            </div>
					      </td>
					    </tr>";
			}
			$tabla .= "</tbody>
				</table>";
    	}else{
    		$tabla = "no hay datos";
    	}
    	return $tabla;
    }
    public function busqueda_destino_egreso(Request $request)
    {
    	$destinos_egresos = DestinoEgreso::select('*')
    	->join('trx_egresos','destinos_egresos.idTrxEgreso','=','trx_egresos.idTrxEgreso')
    	->join('tipos_medios_pagos','destinos_egresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
    	->join('estados','destinos_egresos.idEstado','=','estados.idEstado')
    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
    	->where('usuarios.nombre', 'like', $request->consulta.'%')
    	->orWhere('usuarios.apellido', 'like', $request->consulta.'%')
    	->orWhere('usuarios.rut', 'like', $request->consulta.'%')
    	->orWhere('usuarios.correo', 'like', $request->consulta.'%')
    	->orWhere('telefonos.numero', 'like', $request->consulta.'%')
    	->get();
    	if (count($destinos_egresos)) {
    		$tabla = "<table class='table project-list-table table-nowrap table-centered table-borderless' id='datos'>
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Monto Egresado</th>
				      <th>Medio de Pago</th>
				      <th>Nombre Usuario</th>
				      <th>Rut</th>
				      <th>Correo</th>
				      <th>Telefono</th>
				      <th>Estado</th>
				      <th>Nombre Banco</th>
				      <th>Nombre Destinatario</th>
				      <th>Código Swift</th>
				      <th>Número de Cuenta</th>
				      <th>Notas</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>";
			foreach ($destinos_egresos as $destino_egreso) {
				$tabla .= "<tr>
					      <td>".$destino_egreso->idTrxEgreso."</td>
					      <td>$".number_format($destino_egreso->monto,0,',','.')."</td>
					      <td>".$destino_egreso->nombreTipoMedioPago."</td>
					      <td>".$destino_egreso->nombre." ".$destino_egreso->apellido."</td>
					      <td>".$destino_egreso->rut."</td>
					      <td>".$destino_egreso->correo."</td>
					      <td>".$destino_egreso->numero."</td>
					      <td>".$destino_egreso->nombreEstado."</td>
					      <td>".$destino_egreso->nombreBanco."</td>
					      <td>".$destino_egreso->nombreDestinatario."</td>
					      <td>".$destino_egreso->codigoSwift."</td>
					      <td>".$destino_egreso->numeroCuenta."</td>
					      <td>".$destino_egreso->notas."</td>
					      <td>
					      	<div class='dropdown'>
                                <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
                                    <i class='mdi mdi-dots-horizontal font-size-18'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu'>
					      			<a href='".asset('napalm/destinos-egresos/detalles')."/".$destino_egreso->idTrxEgreso."' class='dropdown-item btn btn-warning'>Ver Detalles</a>
                                </div>
                            </div>
					      </td>
					    </tr>";
			}
    	}else{
    		$tabla = "no hay datos";
    	}
    	return $tabla;
    }
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
				->where(function($query) use ($search){
					$query->where('usuarios.nombre', 'LIKE',"%{$search}%")
			    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
			    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
			    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
			    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
				})
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
				->where(function($query) use ($search){
					$query->where('usuarios.nombre', 'LIKE',"%{$search}%")
				    	->orWhere('usuarios.apellido', 'LIKE',"%{$search}%")
				    	->orWhere('usuarios.rut', 'LIKE',"%{$search}%")
				    	->orWhere('usuarios.correo', 'LIKE',"%{$search}%")
				    	->orWhere('telefonos.numero', 'LIKE',"%{$search}%")
					})
					->count();
		}

		$data = array();
		if(!empty($ingresos)){
			foreach ($ingresos as $ingreso){
				$nestedData['idTrxIngreso'] = $ingreso->idTrxIngreso;
				$nestedData['monto'] ="$".number_format($ingreso->monto,0,',','.');
				$nestedData['webClient'] = $ingreso->webClient;
				$nestedData['nombre'] = $ingreso->nombre;
				$nestedData['rut'] = $ingreso->rut;
				$nestedData['correo'] = $ingreso->correo;
				$nestedData['numero'] = $ingreso->numero;
				$nestedData['nombreEstado'] = $ingreso->nombreEstado;
				$nestedData['nombreTipoMedioPago'] = $ingreso->nombreTipoMedioPago;
				$nestedData['options'] = "<div class='dropdown'>
	                                <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
	                                    <i class='mdi mdi-dots-horizontal font-size-18'></i>
	                                </a>
	                                <div class='dropdown-menu dropdown-menu'>
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
}
