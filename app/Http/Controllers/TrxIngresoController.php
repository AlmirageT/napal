<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TrxIngreso;
use Session;
use DB;

class TrxIngresoController extends Controller
{
    public function index()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
           return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
    	return view('admin.transacciones.ingresos.index');
    }
    public function detalle($idTrxIngreso)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            toastr()->info('Debe estar ingresado para poder entrar a esta pagina');
           return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3) {
                toastr()->info('No tiene permiso para entrar a esta pagina');
               return abort(401);
            }
        }
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
