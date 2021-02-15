<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TrxEgresos;
use Session;
use DB;

class TrxEgresoController extends Controller
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
    	return view('admin.transacciones.egresos.index');
    }
    public function detalle($idTrxEgreso)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            toastr()->info('Debe estar ingresado para poder entrar a esta pagina');
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
        $egreso = TrxEgresos::select('*')
        ->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
        ->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
        ->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
        ->where('trx_egresos.idTrxEgreso',$idTrxEgreso)
        ->first();
        return view('admin.transacciones.egresos.factura',compact('egreso'));
    }
}
