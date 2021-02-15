<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use App\Mail\CorreoTransferencia;
use App\CuentaBancariaUsuario;
use App\InstruccionBancaria;
use App\TrxEgresos;
use Mail;
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
        if ($request->file('comprobanteBancario')) {
            InstruccionBancaria::find($idIntruccionBancaria)->update([
                'validado'=>1,
                'idUsuarioAceptarSolicitud' => Session::get('idUsuario')
            ]);
            $obtenerCorreoUsuario = InstruccionBancaria::select('*')
                ->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
                ->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
                ->where('instrucciones_bancarias.idIntruccionBancaria',$idIntruccionBancaria)
                ->first();
            $data_uri = base64_encode(file_get_contents($request->file('comprobanteBancario')));
            CuentaBancariaUsuario::find($obtenerCorreoUsuario->idCuentaBancariaUsuario)->update([
                'comprobanteBancario' => $data_uri
            ]);
            Session::put('usuarioIDSaldo',$obtenerCorreoUsuario->idUsuario);
            TrxEgresos::create([
                'idUsuario' => $obtenerCorreoUsuario->idUsuario,
                'monto' => $obtenerCorreoUsuario->importe,
                'idMoneda' => 1,
                'webClient' => $request->userAgent()
            ]);
            Mail::to($obtenerCorreoUsuario->correo)->send(new CorreoTransferencia($obtenerCorreoUsuario,$data_uri));
            toastr()->success('Se ha aprobado la transferencia de forma correcta','Aprobado');

            return redirect::to('napalm/solicitud-retiro');
        }else{
            toastr()->info('Debe tener el comprobante de transferencia');
            return back();
        }


        /*
        if ($request->file('comprobanteBancario')) {
            $imagen = $request->file('comprobanteBancario');
            $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
            $imagen->move('assets/images/validarTransferencia/',$imgName);
        }*/
    }
    public function retirosAceptados()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
        return view('admin.retirosAceptados.index');
    }
}
