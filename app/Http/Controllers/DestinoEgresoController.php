<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\DestinoEgreso;
use DB;

class DestinoEgresoController extends Controller
{
    public function index()
    {
    	$destinosEgresos = DestinoEgreso::select('*')
    	->join('trx_egresos','destinos_egresos.idTrxEgreso','=','trx_egresos.idTrxEgreso')
    	->join('tipos_medios_pagos','destinos_egresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
    	->join('estados','destinos_egresos.idEstado','=','estados.idEstado')
    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
    	->orderBy('destinos_egresos.idDestinoEgreso','DESC')
    	->paginate(10);
    	return view('admin.transacciones.destinos_egresos.index',compact('destinosEgresos'));
    }
    public function detalle($idDestinoEgreso)
    {
    	$destinoEgreso = DestinoEgreso::select('*')
    	->join('trx_egresos','destinos_egresos.idTrxEgreso','=','trx_egresos.idTrxEgreso')
    	->join('tipos_medios_pagos','destinos_egresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
    	->join('estados','destinos_egresos.idEstado','=','estados.idEstado')
    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
        ->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
    	->where('destinos_egresos.idDestinoEgreso',$idDestinoEgreso)
    	->first();
    	return view('admin.transacciones.destinos_egresos.factura',compact('destinoEgreso'));
    }
}
