<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Mensajeria;
use App\Usuario;
use App\Avatar;
use App\LogRegistro;
use Session;
use DB;

class LoginController extends Controller
{
    public function index()
    {
    	if (Session::has('rut') || Session::has('correo')) {
            return back();
        }
    	return view('auth.login');
    }
    public function ingreso_session(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'correo' => 'required',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return redirect::back();
            }
            DB::beginTransaction();
    		$correo = Usuario::where('correo', $request->correo)->firstOrFail();
    		if ($correo) {
	    		$pass_decrytp = Crypt::decrypt($correo->password);
	    		if ($pass_decrytp == $request->password) {
	    			if ($correo->activarCuenta == 0) {
		                // cuenta aun no activada
		                toastr()->info('Su cuenta aún no ha sido activada. Active su cuenta mediante el link enviado');
		                 return redirect::back();
		            }
		            Session::put('idUsuario', $correo->idUsuario);
		            Session::put('idTipoUsuario', $correo->idTipoUsuario);
		            Session::put('nombre', $correo->nombre);
		            Session::put('apellido', $correo->apellido);
		            Session::put('correo', $correo->correo);
		            Session::put('rut', $correo->rut);
                    LogRegistro::create([
                        'idUsuario'=> $correo->idUsuario
                    ]);

		            if ($correo->idAvatar) {
						$imgAvatar = Avatar::findOrFail($correo->idAvatar);
		                Session::put('avatar', $imgAvatar->rutaAvatar);
		            } else {
		                Session::put('avatar', 'usergeneric.png');
		            }

		            if (Session::get('idTipoUsuario') == 3) {
		                // usuarios internos
                		toastr()->success('Ingreso Exitoso','Bienvenido: '.$correo->nombre, ['timeOut' => 5000]);
                        DB::commit();
		                return redirect::to('napalm/home');
		            }
            		toastr()->success('Ingreso Exitoso','Bienvenido: '.$correo->nombre, ['timeOut' => 5000]);
                    DB::commit();
        			return redirect::to('dashboard');
	    		}else{
            		toastr()->warning('Usuario y/o contraseña incorrecto');
                    DB::rollback();
        			 return redirect::back();
	    		}
	    	}
    		toastr()->warning('Usuario y/o contraseña incorrecto');
            DB::rollback();
			return back();
        } catch (QueryException $e) {
            // error conexion a BBDD
            toastr()->warning('Se ha producido un error interno. Favor intente nuevamente');
            DB::rollback();

            return redirect('/');
        } catch (ModelNotFoundException $e) {
            toastr()->warning('Usuario y/o contraseña incorrecto');
            DB::rollback();

            return redirect('/');
        } catch (Exception $e) {
            toastr()->warning('Se ha producido un error. Favor intente nuevamente');
            DB::rollback();
            
            return redirect('/');
        }
    }
    public function logout(Request $request) {

    	if (!Session::has('rut') || !Session::has('correo') ) {
    	    return redirect('/');
        }
		Session::forget('idUsuario');
		Session::forget('idTipoUsuario');
		Session::forget('nombre');
		Session::forget('correo');
		Session::forget('rut');
		Session::forget('apellido');

        return redirect('/');
    }
    public function reenviarSMS(Request $request) {

        try {
            if ($request->ajax()) {
                $numero = Crypt::decrypt($request->numero);
                $usuario = Usuario::where('numero', $numero)->firstOrFail();

                $enviar = Mensajeria::sendSMS();
                $enviar['cliente']->messages->create('+56' . $numero,
                    [
                        'from' => $enviar['numero'],
                        'body' => 'Para activar tu cuenta isbast haz clic en el siguiente link ' . asset('/api/activarCuentaSMS?tsms=') . $usuario->idUsuario
                    ]);

                return response()->json(['status' => true, 'message' => 'SMS enviado correctamente'], 200);
            }

        } catch (DecryptException $e) {
            toastr()->error('Numero incorrecto');
            return response()->json(['status' => false, 'message' => 'No se envio el SMS o error de numero'], 401);
        }
    }

}
