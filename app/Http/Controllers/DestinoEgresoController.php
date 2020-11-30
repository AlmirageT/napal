<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\DestinoEgreso;
use Session;
use DB;

class DestinoEgresoController extends Controller
{
    public function index()
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
    	return view('admin.transacciones.destinos_egresos.index');
    }
    public function detalle($idDestinoEgreso)
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
