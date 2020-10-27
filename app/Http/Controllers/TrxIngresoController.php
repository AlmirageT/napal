<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TrxIngreso;
use DB;

class TrxIngresoController extends Controller
{
    public function index()
    {
    	$ingresos = TrxIngreso::select('*')
    	->join('usuarios','trx_ingresos.idUsuario','=','usuarios.idUsuario')
    	->join('monedas','trx_ingresos.idMoneda','=','monedas.idMoneda')
    	->join('estados','trx_ingresos.idEstado','=','estados.idEstado')
    	->join('tipos_medios_pagos','trx_ingresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
    	->orderBy('trx_ingresos.idTrxIngreso','DESC')
    	->paginate(10);
    	return view('admin.transacciones.ingresos.index',compact('ingresos'));
    }
    public function detalle($idTrxIngreso)
    {
        # code...
    }
}
