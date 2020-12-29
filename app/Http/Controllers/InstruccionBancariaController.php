<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\InstruccionBancaria;
use Session;
use DB;

class InstruccionBancariaController extends Controller
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

    	return view('admin.solicitudRetiro.index');
    }
    public function vistaValidarTransferencia($idIntruccionBancaria)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
        $instruccionBancaria = InstruccionBancaria::find($idIntruccionBancaria);
        return view('admin.solicitudRetiro.validarTransferencia',compact('instruccionBancaria'));
    }
    public function validacion(Request $request, $idIntruccionBancaria)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
        InstruccionBancaria::find($idIntruccionBancaria)->update([
            'validado'=>1
        ]);
        /*
        if ($request->file('comprobanteBancario')) {
            $imagen = $request->file('comprobanteBancario');
            $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
            $imagen->move('assets/images/validarTransferencia/',$imgName);
        }*/
    }
}
