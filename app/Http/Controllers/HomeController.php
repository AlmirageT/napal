<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function home()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
    	return view('admin.home');
    }
}
