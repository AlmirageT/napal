<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Mail\ConfirmacionInversion;
use App\SaldoDisponible;
use App\TrxIngreso;
use App\Propiedad;
use Session;
use Mail;
use DB;

class InvierteController extends Controller
{
    public function invierte(Request $request, $idPropiedad)
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            toastr()->info('Debe estar ingresado para poder invertir');
    		return back();
    	}
		try {
            $validator = Validator::make($request->all(), [
                'valorInvertir' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Debes ingresar un valor para invertir');
                return back();
            }
            DB::beginTransaction();
            $caracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
			$sinCaracteres = str_replace($caracteresEspeciales, "", $request->valorInvertir);
            
            $propiedad = Propiedad::find(Crypt::decrypt($idPropiedad));
            $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->get();

            DB::commit();
            return view('confirmar',compact('propiedad','sinCaracteres','saldoDisponible'));
        } catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            DB::rollback();
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            DB::rollback();
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back();
        } catch (Exception $e) {
            DB::rollback();         
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
    }
    public function verificarDatos(Request $request,$idPropiedad)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        DB::beginTransaction();
        if ($request->metodoDeposito == 1) {
            TrxIngreso::create([
                'monto' => $request->saldo,
                'webClient' => $_SERVER['HTTP_USER_AGENT'],
                'idUsuario' => Session::get('idUsuario'),
                'idMoneda' => 1,
                'idEstado' => 1,
                'idTipoMedioPago' => 1,
                'idPropiedad' => Crypt::decrypt($idPropiedad)
            ]);
            $caracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
            $sinCaracteres = str_replace($caracteresEspeciales, "", $request->sinCaracteres);
            $propiedad = Propiedad::find(Crypt::decrypt($idPropiedad));
            $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->get();
            Mail::to(Session::get('correo'))->send(new ConfirmacionInversion($propiedad,$sinCaracteres));
            DB::commit();
            return redirect::to('exito');
        }
        if ($request->metodoDeposito == 2) {
            $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->get();
            if (count($saldoDisponible)>0) {
                if ($saldoDisponible->first()->cantidadSaldoDisponible >= $request->sinCaracteres  ) {
                    TrxIngreso::create([
                        'monto' => $request->saldo,
                        'webClient' => $_SERVER['HTTP_USER_AGENT'],
                        'idUsuario' => Session::get('idUsuario'),
                        'idMoneda' => 1,
                        'idEstado' => 1,
                        'idTipoMedioPago' => 1,
                        'idPropiedad' => Crypt::decrypt($idPropiedad)
                    ]);
                    $nuevoValor = $saldoDisponible->first()->cantidadSaldoDisponible - $request->sinCaracteres;
                    SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->update([
                        'cantidadSaldoDisponible'=>$nuevoValor
                    ]);
                    $caracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
                    $sinCaracteres = str_replace($caracteresEspeciales, "", $request->sinCaracteres);
                    $propiedad = Propiedad::find(Crypt::decrypt($idPropiedad));
                    Mail::to(Session::get('correo'))->send(new ConfirmacionInversion($propiedad,$sinCaracteres));
                    DB::commit();
                	return redirect::to('exito');
                }else{
                    $propiedad = Propiedad::find(Crypt::decrypt($idPropiedad));

                    $caracteresEspecialesNombrePropiedad = array(" ");
                    $nombreConGuion = str_replace($caracteresEspecialesNombrePropiedad, "-", $propiedad->nombrePropiedad);
                    toastr()->warning('Debe tener dinero en su cuenta para realizar esta transacción','Ha surgido un error inesperado');
                    DB::rollback();         
                    return redirect::to('invierte/chile/propiedad/detalle?nombrePropiedad='.$nombreConGuion.'&idPropiedad='.$idPropiedad);
                }
            }else{
                $propiedad = Propiedad::find(Crypt::decrypt($idPropiedad));

                $caracteresEspecialesNombrePropiedad = array(" ");
                $nombreConGuion = str_replace($caracteresEspecialesNombrePropiedad, "-", $propiedad->nombrePropiedad);
                toastr()->warning('Debe tener dinero en su cuenta para realizar esta transacción','Ha surgido un error inesperado');
                DB::rollback();         
                return redirect::to('invierte/chile/propiedad/detalle?nombrePropiedad='.$nombreConGuion.'&idPropiedad='.$idPropiedad);
            }
        }
    }
}
