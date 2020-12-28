<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaldoDisponible;
use Session;

class MiCuentaController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->get();
        return view('public.miCuenta',compact('saldoDisponible'));
    }
}
