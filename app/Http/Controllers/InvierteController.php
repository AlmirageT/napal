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
use App\BoletaOtroPago;
use App\TrxIngreso;
use App\Propiedad;
use App\ParametroGeneral;
use Session;
use DateTime;
use Mail;
use DB;

class InvierteController extends Controller
{
    public function invierte(Request $request, $idPropiedad)
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            toastr()->info('Debe estar ingresado para poder invertir');
            if(Session::has('redirect_url')){
                Session::forget('redirect_url');
            }
            Session::put('redirect_url','invierte/chile/propiedad/detalle?idPropiedad='.$idPropiedad);
    		return redirect::to('login');
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
            if(Session::has('redirect_url')){
                Session::forget('redirect_url');
            }
            $parametroGeneral = ParametroGeneral::where('nombreParametroGeneral','VALOR INICIO')->firstOrFail();
            $caracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
            $sinCaracteres = str_replace($caracteresEspeciales, "", $request->valorInvertir);
            if(intval($sinCaracteres) < intval($parametroGeneral->valorParametroGeneral)){
                DB::rollback();
                toastr()->info('ser mayor a $'.number_format($parametroGeneral->valorParametroGeneral,0,',','.').' pesos');
                return back();
            }
            
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
        $validator = Validator::make($request->all(), [
            'condiciones'=> 'required',
            'metodoDeposito'=> 'required'
        ]);
        if ($validator->fails()) {
            toastr()->info('Los datos deben estar llenos');
            return redirect::to('invierte-propiedad/'.$idPropiedad);
        }
        DB::beginTransaction();
        if ($request->metodoDeposito == 1) {
            //caracteres especiales para rut
            $caracteresEspeciales = array(".","-");
            $rutSinGuion = str_replace($caracteresEspeciales, "", Session::get('rut'));
            $date = new DateTime();
            $date->modify('+48 hours');

            if(intval($request->saldo) > 2000000 ){
                toastr()->info('No puede superar los 2 millones');
                DB::rollback();
                return redirect::to('invierte/chile/propiedad/detalle?idPropiedad='.$idPropiedad);
            }

            BoletaOtroPago::create([
                'cantidadBoletaOtroPago' => $request->saldo,
                'fechaVencimiento' => $date->format('Y-m-d H:i:s'),
                'idUsuario' => Session::get('idUsuario'),
                'idEstado' => 11,
                'idPropiedad' => Crypt::decrypt($idPropiedad)
            ]);
            DB::commit();
            return redirect()->to('http://pre.otrospagos.com/publico/portal/enlace?id='.getenv('OTROS_PAGOS_COVENIO').'&idcli='.$rutSinGuion.'&tiidc=01');
           /* TrxIngreso::create([
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
            return redirect::to('exito');*/
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
                        'idEstado' => 12,
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
                    $propiedadesInversion = Propiedad::select('*')
                    ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
                    ->join('paises','propiedades.idPais','=','paises.idPais')
                    ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
                    ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
                    ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
                    ->join('estados','propiedades.idEstado','=','estados.idEstado')
                    ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
                    ->join('tipos_calidades','propiedades.idTipoCalidad','=','tipos_calidades.idTipoCalidad')
                    ->where('propiedades.idPropiedad',Crypt::decrypt($idPropiedad))
                    ->first();

                    $totalIngresos = TrxIngreso::where('idPropiedad',Crypt::decrypt($idPropiedad))->get();
                    $suma = 0;
                    $porcentaje = 0;

                    foreach($totalIngresos as $totalIngreso){
                        $suma = $suma + $totalIngreso->monto;
                        if($suma>0){
                            $porcentaje = ($suma*100)/$propiedadesInversion->precio;
                        }else{
                            $porcentaje = 0;
                        }
                    }
                    $date1 = new DateTime($propiedadesInversion->fechaInicio);
                    $date2 = new DateTime($propiedadesInversion->fechaFinalizacion);
                    $diff = $date1->diff($date2);
                    $inversion = $request->saldo;
                    DB::commit();
                	return view('exito',compact('propiedadesInversion','suma','porcentaje','diff','inversion'));
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
        if($request->metodoDeposito == 3){
            if(intval($request->saldo) > 2000000 ){
                toastr()->info('No puede superar los 2 millones');
                DB::rollback();
                return redirect::to('invierte/chile/propiedad/detalle?idPropiedad='.$idPropiedad);
            }
            if(Session::has('propiedadPaypal')){
                Session::forget('propiedadPaypal');
            }
            if(Session::has('clp')){
                Session::forget('clp');
            }
            Session::put('propiedadPaypal',Crypt::decrypt($idPropiedad));
            Session::put('clp',$request->saldo);
            return redirect::to('dashboard/paypal');
        }
    }
    public function vistaExito(Type $var = null)
    {
        # code...
    }
}
