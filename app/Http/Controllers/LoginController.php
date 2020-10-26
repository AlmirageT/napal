<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use App\Usuario;
use App\Avatar;
use Illuminate\Support\Facades\Crypt;


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
    		$correo = Usuario::where('correo', $request->correo)->firstOrFail();
    		if ($correo) {
	    		$pass_decrytp = Crypt::decrypt($correo->password);
	    		if ($pass_decrytp == $request->password) {
	    			if ($correo->activarCuenta == 0) {
		                // cuenta aun no activada
		                toastr()->info('Su cuenta aún no ha sido activada. Active su cuenta mediante el link enviado');
		                return redirect('/');
		            }
		            Session::put('idUsuario', $correo->idUsuario);
		            Session::put('idTipoUsuario', $correo->idTipoUsuario);
		            Session::put('nombre', $correo->nombre);
		            Session::put('apellido', $correo->apellido);
		            Session::put('correo', $correo->correo);
		            Session::put('rut', $correo->rut);
		            if ($correo->idAvatar) {
						$imgAvatar = Avatar::findOrFail($correo->idAvatar);
		                Session::put('avatar', $imgAvatar->rutaAvatar);
		            } else {
		                Session::put('avatar', 'usergeneric.png');
		            }

		            if (Session::get('idTipoUsuario') == 3) {
		                // usuarios internos
                		toastr()->success('Ingreso Exitoso','Bienvenido: '.$correo->nombre, ['timeOut' => 5000]);

		                return redirect::to('napalm/home');
		            }
            		toastr()->success('Ingreso Exitoso','Bienvenido: '.$correo->nombre, ['timeOut' => 5000]);
        			return redirect::to('/');
	    		}else{
            		toastr()->warning('Usuario y/o contraseña incorrecto');
        			return redirect::to('/');
	    		}
	    	}
    		toastr()->warning('Usuario y/o contraseña incorrecto');
			return redirect::to('/');
        } catch (QueryException $e) {
            // error conexion a BBDD
            toastr()->warning('Se ha producido un error interno. Favor intente nuevamente');
            return redirect('/');
        } catch (ModelNotFoundException $e) {
            toastr()->warning('Usuario y/o contraseña incorrecto');
            return redirect('/');
        } catch (Exception $e) {
            toastr()->warning('Se ha producido un error. Favor intente nuevamente');
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
}
