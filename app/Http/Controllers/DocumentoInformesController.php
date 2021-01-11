<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CodigoUsuario;
use Session;
use DB;

class DocumentoInformesController extends Controller
{
    public function index()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        return view('public.documentosInformes');
    }
}
