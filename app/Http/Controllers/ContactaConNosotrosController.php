<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Mail\EnvioConsulta;
use App\Mail\ConfirmarEnvio;
use Mail;

class ContactaConNosotrosController extends Controller
{
    public function enviarCorreo(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'nombre'=> 'required',
            'email'=> 'required|email',
            'asunto'=> 'required',
            'mensaje'=> 'required',
            'condiciones'=> 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        if ($validator->fails()) {
            toastr()->info('Totos los datos son requeridos');
            return back();
        }
        try {
        	$nombre = $request->nombre;
        	$email = $request->email;
        	$asunto = $request->asunto;
        	$mensaje = $request->mensaje;

            Mail::to('saezsotoivan@gmail.com')->send(new EnvioConsulta($nombre, $email, $asunto, $mensaje));
            Mail::to($email)->send(new ConfirmarEnvio($asunto, $nombre, $mensaje));
            toastr()->info('Mensaje enviado correctamente, revise su correo');
        	return back();
        } catch (QueryException $e) {
            toastr()->warning('Ya posee una cuenta creada. Puede recuperar su cuenta mediante "olvido su clave"');
            return back();
        } catch (\Exception $e) { // catch para Mail
            toastr()->warning('No se ha podido enviar la notificacion de correo, favor intente nuevamente' . $e->getMessage());
        }
    }
}
