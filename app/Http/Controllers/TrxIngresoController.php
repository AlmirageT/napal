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
    	return view('admin.transacciones.ingresos.index');
    }
    public function detalle($idTrxIngreso)
    {
        $ingreso = TrxIngreso::select('*')
        ->join('usuarios','trx_ingresos.idUsuario','=','usuarios.idUsuario')
        ->join('monedas','trx_ingresos.idMoneda','=','monedas.idMoneda')
        ->join('estados','trx_ingresos.idEstado','=','estados.idEstado')
        ->join('tipos_medios_pagos','trx_ingresos.idTipoMedioPago','=','tipos_medios_pagos.idTipoMedioPago')
        ->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
        ->where('trx_ingresos.idTrxIngreso',$idTrxIngreso)
        ->first();
        return view('admin.transacciones.ingresos.factura',compact('ingreso'));
    }
}
