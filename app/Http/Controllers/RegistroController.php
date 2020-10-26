<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\ParametroGeneral;
use App\Helpers\Mensajeria;
use App\Helpers\AvisosHelper;
use Illuminate\Support\Facades\Mail;
use App\Telefono;

class RegistroController extends Controller
{
    public function store(Request $request)
    {

        // validando codigo captcha
        DB::beginTransaction();
        $rules = [
            'rut' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'numero' => 'required|digits:9|numeric',
            'correo' => 'required',
            'password' =>
                ['required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/'];  // contener mayus, minus y numeros

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();

            if ($errors->has('password')) {
                $arrayErrores = $errors->get('password');
                toastr()->error($arrayErrores[0] . ' letras y numeros', 'Error');
                return back();
            } else {
                $listaErrores = $errors->all();
                $txtError = '';
                foreach ($listaErrores as $error) {
                    $txtError = $txtError . ', ' . $error;
                }
                toastr()->error($txtError, 'Error');
            }

            /*
            if (isset($request->idRegion) && isset($request->idProvincia) && isset($request->idComuna)) {
                    $regionSeleccionada = Region::where('id', '=', $request->idRegion)->get();
                    $provinciaSeleccionada = Provincia::where('id', '=', $request->idProvincia)->get();
                    $comunaSeleccionada = Comuna::where('id', '=', $request->idComuna)->get();
            }
            */

            DB::rollback();

            return back();
        }
        else
        {
            try {
                if (isset($request->numero)) {
                    $buscarTelefono = Usuario::where('numero', $request->numero)->first();
                    if ($buscarTelefono) {
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
                $nuevoUsuario->save();
                $nuevoUsuario->token = encrypt($nuevoUsuario->idUsuario);
                $nuevoUsuario->save();

                $telefono = new Telefono();
                $telefono->idUsuario = $nuevoUsuario->idUsuario;
                $telefono->numero = $request->numero;
                $telefono->idTipoTelefono = 2;
                $telefono->save();

                $metodoActivacion = ParametroGeneral::where('nombreParametroGeneral', '=', 'METODO NOTIFICACION ACTIVACION CUENTA')->firstOrFail();

                if ($metodoActivacion->valorParametro == 1) { // 1 es por SMS; 2 es por correo
                    if ($nuevoUsuario->idUsuario) {
                        $enviar = Mensajeria::sendSMS();
                        $enviar['cliente']->messages->create('+56' . $nuevoUsuario->numero,
                            [
                                'from' => $enviar['numero'],
                                'body' => 'Para activar tu cuenta isbast haz clic en el siguiente link ' . asset('/api/activarCuentaSMS?tsms=') . $nuevoUsuario->tokenCorto
                            ]);

                        DB::commit();

                        return view ('auth.envioToken', compact('request'));
                    }

                } else { // sino es 2 (activacion por correo)
                    /*Mail::to($nuevoUsuario->correo)
                            ->bcc('pauloberrios@gmail.com')
                            ->send(new ActivarCuentaEmail($datosCorreo));*/
                    toastr()->success('Active su cuenta mediante el correo enviado', "Se ha enviado un correo electronico a su email para activar su cuenta", ['positionClass' => 'toast-bottom-right']);
                }

                DB::commit();
                return redirect('/');

            } catch (QueryException $e) {
                if (isset($request->idRegion) && isset($request->idProvincia) && isset($request->idComuna)) {
                    $regionSeleccionada = Region::where('id', '=', $request->idRegion)->get();
                    $provinciaSeleccionada = Provincia::where('id', '=', $request->idProvincia)->get();
                    $comunaSeleccionada = Comuna::where('id', '=', $request->idComuna)->get();
                }
                toastr()->warning('Ya posee una cuenta creada. Puede recuperar su cuenta mediante "olvido su clave"');
                DB::rollback();

                return back();
            } catch (\Exception $e) { // catch para Mail
                if (isset($request->idRegion) && isset($request->idProvincia) && isset($request->idComuna)) {
                    $regionSeleccionada = Region::where('id', '=', $request->idRegion)->get();
                    $provinciaSeleccionada = Provincia::where('id', '=', $request->idProvincia)->get();
                    $comunaSeleccionada = Comuna::where('id', '=', $request->idComuna)->get();
                }
                toastr()->warning('No se ha podido enviar la notificacion de correo, favor intente nuevamente' . $e->getMessage());
                DB::rollback();

                return back();
            }
        }
    }
}
