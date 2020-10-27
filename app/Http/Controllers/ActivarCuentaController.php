<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Mail;
use Validator;

class ActivarCuentaController extends Controller
{
	public function activarCuenta(Request $request) {
    	// activar cuenta luego de recibir token
    	// NOTA: dado que peticion origen proviene fuera de Laravel, no se pueden ejecutar toastr y otros elementos JS; con comportamientos de Page Expired en caso de continuar operando con el sitio. Se llamarán mediante redirect a paginas tipo "alertas" con la información relativa a cada caso

    	try {
	    	if ($request) {
	    		if (isset($request->t)) {
	    			// DEPRECATED
                    //$rut = Crypt::decrypt($request->t);
	    			//$usuarioEncontrado = Usuario::where('rut', '=', $rut)->firstOrFail();
                    
                    $usuarioEncontrado = Usuario::where('tokenCorto', $request->t)->firstOrFail();
	    			if ($usuarioEncontrado) {
	    				// detectando si la cuenta esta previamente activada
	    				if ($usuarioEncontrado->activarCuenta == 1) {
	    					return redirect('notificacion/cuentaYaActivada');
	    				} else {
	    					// activando la cuenta si no está activada aun
		    				$usuarioEncontrado->activarCuenta = 1;
		    				$usuarioEncontrado->save();
	    				}
	    			}

                    //Mail::to($usuarioEncontrado->correo)->send(new BienvenidoEmail($datosCorreo)); // datosCorreo a $data en el mail
	            	toastr()->success('La cuenta ha sido activada de forma exitosa', 'Ingrese a su cuenta', ['timeOut' => 9000]);
	    			return redirect('notificacion/cuentaActivadaCorrectamente');
	    		}
	    	}
    	} catch (ModelNotFoundException $e) {
    		return redirect('notificacion/cuentaNoEncontrada');
    	} catch (QueryException $e) {
    		// TODO: catch a una tabla para alertar a soporte en caso de error masivo
    		return redirect('notificacion/errorInterno');
    	} catch (DecryptException $e) {
    		// TODO: catch a una tabla para alertar a soporte en caso de error masivo
    		return redirect('notificacion/errorInterno');
    	}
    }
    public function activarCuentaSMS(Request $request) { // GET ../api/activarCuentaSMS?tsms=.....
        // activacion de cuenta mediante SMS "NO UTILIZANDO Crypt" sino que llegando directamente al idUsuario
        try {
            if ($request) {
                if (isset($request->tsms)) {
                    // DEPRECATED
                    //$rut = Crypt::decrypt($request->t);
                    //$usuarioEncontrado = Usuario::where('rut', '=', $rut)->firstOrFail();
                    $usuarioEncontrado = Usuario::where('tokenCorto', $request->tsms)->firstOrFail();
                    if ($usuarioEncontrado) {
                        // detectando si la cuenta esta previamente activada
                        if ($usuarioEncontrado->activarCuenta == 1) {
                            return redirect('notificacion/cuentaYaActivada');
                        } else {
                            // activando la cuenta si no está activada aun
                            $usuarioEncontrado->activarCuenta = 1;
                            $usuarioEncontrado->save();
                        }
                    }


                    //Mail::to($usuarioEncontrado->correo)->send(new BienvenidoEmail($datosCorreo)); 

                    return redirect('notificacion/cuentaActivadaCorrectamente');
                }
            }
        } catch (ModelNotFoundException $e) {
            return redirect('notificacion/cuentaNoEncontrada');
        } catch (QueryException $e) {
            // TODO: catch a una tabla para alertar a soporte en caso de error masivo
            return redirect('notificacion/errorInterno');
        } catch (DecryptException $e) {
            // TODO: catch a una tabla para alertar a soporte en caso de error masivo
            return redirect('notificacion/errorInterno');
        }
    }
    public function cuentaYaActivada() {
    	return view ('auth.cuentapreviamenteactivada');
    }

    public function cuentaActivadaCorrectamente() {
    	return view ('auth.login');
    }

    public function cuentaNoEncontrada() {
    	return view('auth.cuentanoencontrada');
    }

    public function errorInterno() {
        return view ('auth.errorinterno');
    }
}
