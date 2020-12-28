<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCuenta;
use App\Pais;
use Session;
use DB;

class CuentaBancariaController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }

    	$paises = Pais::pluck('nombrePais','idPais');
    	$tiposCuentas = TipoCuenta::pluck('nombreTipoCuenta','idTipoCuenta');
    	return view('public.añadirCuentaBancaria',compact('paises','tiposCuentas'));
    }
}
