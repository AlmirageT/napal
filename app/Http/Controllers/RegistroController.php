<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Mail\TokenConfirmacion;
use App\Helpers\Mensajeria;
use App\ParametroGeneral;
use App\CodigoPromocional;
use App\Telefono;
use App\Usuario;
use App\Codigo;
use Mail;
use DB;

class RegistroController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre'=> 'required',
                'apellido'=> 'required',
                'numero'=> 'required',
                'correo'=> 'required',
                'rut'=> 'required',
                'password'=> 'required',
                'condiciones'=>'required',
                'g-recaptcha-response' => 'required|captcha',
            ]);
            if ($validator->fails()) {
                toastr()->info('Verifique que no es un robot');
                return back();
            }
            DB::beginTransaction();
            if ($request->numero != null) {
                $buscarTelefono = Telefono::where('numero', $request->numero)->first();
                if ($buscarTelefono != null) {
                    toastr()->warning('El numero de telefono ha sido ingresado. Si desea recuperar el acceso a su cuenta, haga clic en "Recuperar contraseña"');
                    DB::rollback();
                    return back();
                }
            }
            // registrando OK el nuevo usuario sin activar
            $nuevoUsuario = new Usuario();
            $nuevoUsuario->nombre = $request->nombre;
            $nuevoUsuario->apellido = $request->apellido;
            $nuevoUsuario->rut = $request->rut;
            $nuevoUsuario->correo = $request->correo;
            $nuevoUsuario->password = Crypt::encrypt($request->password);
            $nuevoUsuario->tokenCorto = uniqid();
            $nuevoUsuario->activarCuenta = 0;
            $nuevoUsuario->activarNewsletter = 0;
            $nuevoUsuario->desactivarCuenta = 0;
            $nuevoUsuario->idTipoUsuario = 2;
            $nuevoUsuario->idTipoPersona = 1;
            $nuevoUsuario->save();
            $nuevoUsuario->token = encrypt($nuevoUsuario->idUsuario);
            $nuevoUsuario->save();
            if ($request->codigoPromocional) {
                $codigoPromocional = Codigo::where('codigo',$request->codigoPromocional)->first();
                if ($codigoPromocional) {
                    $fecha = date('Y-m-d',strtotime($codigoPromocional->fechaVencimiento));
                    $hoy =date('Y-m-d');
                    if ($hoy <= $fecha) {
                        CodigoPromocional::create([
                            'idCodigo' => $codigoPromocional->idCodigo,
                            'idUsuario'=> $nuevoUsuario->idUsuario
                        ]);
                    }else{
                        toastr()->warning('El codigo promocional que esta tratando de ingresar ya no es valido');
                        DB::rollback();
                        return back();
                    }
                }else{
                    toastr()->warning('El codigo promocional que esta tratando de ingresar no existe, pruebe con uno valido');
                    DB::rollback();
                    return back();
                }
            }

            $telefono = new Telefono();
            $telefono->idUsuario = $nuevoUsuario->idUsuario;
            $telefono->numero = $request->numero;
            $telefono->idTipoTelefono = 2;
            $telefono->save();
            $metodoActivacion = ParametroGeneral::where('nombreParametroGeneral', '=', 'METODO NOTIFICACION ACTIVACION CUENTA')->firstOrFail();
            if ($metodoActivacion->valorParametroGeneral == 1) { // 1 es por SMS; 2 es por correo
                if ($nuevoUsuario->idUsuario) {
                    $enviar = Mensajeria::sendSMS();
                    $enviar['cliente']->messages->create('+56' . $telefono->numero,
                        [
                            'from' => $enviar['numero'],
                            'body' => 'Para activar tu cuenta isbast haz clic en el siguiente link ' . asset('/api/activarCuentaSMS?tsms=') . $nuevoUsuario->tokenCorto
                        ]);

                    DB::commit();

                    return view('auth.envioToken', compact('request'));
                }

            } else { // sino es 2 (activacion por correo)
                $url_token = asset('/api/activarCuentaSMS?tsms=').$nuevoUsuario->tokenCorto;
                Mail::to($nuevoUsuario->correo)->send(new TokenConfirmacion($url_token,$nuevoUsuario));
                toastr()->success('Active su cuenta mediante el correo enviado', "Se ha enviado un correo electronico a su email para activar su cuenta", ['positionClass' => 'toast-bottom-right']);
                DB::commit();
                
                return view('auth.envioToken', compact('request'));
            }
            DB::commit();
            return redirect('/');
        } catch (QueryException $e) {
            toastr()->warning('Ya posee una cuenta creada. Puede recuperar su cuenta mediante "olvido su clave"');
            DB::rollback();
            return back();
        } catch (\Exception $e) { // catch para Mail
            toastr()->warning('No se ha podido enviar la notificacion de correo, favor intente nuevamente' . $e->getMessage());
            DB::rollback();
            return back();
        }
    }
}
