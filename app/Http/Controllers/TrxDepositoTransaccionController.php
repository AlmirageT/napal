<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\TrxDepositoTransferencia;
use App\SaldoDisponible;
use App\TrxIngreso;
use App\Usuario;
use Redirect;
use Session;
use DB;

class TrxDepositoTransaccionController extends Controller
{
    public function index($idUsuario)
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
        $usuario = Usuario::find($idUsuario);
        return view('admin.usuarios.validarTransferencia.transacciones',compact('usuario'));
    }
    public function store(Request $request)
    {
    	try {
    		if (Session::has('idUsuarioDeposito')) {
    			Session::forget('idUsuarioDeposito');
    		}
            $validator = Validator::make($request->all(), [
                'nombreBancoOrigen' => 'required',
                'numeroOperacion'=>'required',
                'bancoOrigen'=>'required',
                'fechaDeposito'=>'required',
                'numeroCuentaBanco'=>'required',
                'rutaImagen'=>'required|max:102400'
            ]);
            if ($validator->fails()) {
                toastr()->info('No debe dejar campos en blanco, las contraseñas deben ser iguales, la imagen debe pesar menos de 100 mb');
                return back();
            }
            DB::beginTransaction();
            Session::put('idUsuarioDeposito',$request->idUsuario);
            $ingreso = TrxIngreso::create([
            	'monto' => $request->montoDeposito,
		    	'webClient' =>$request->userAgent(),
		    	'idUsuario' => $request->idUsuario,
		    	'idMoneda' => 1,
		    	'idEstado' => 1,
		    	'idTipoMedioPago' => 1
            ]);
            $deposito = new TrxDepositoTransferencia($request->all());
            if($request->file('rutaImagen')){
                $imagen = $request->file('rutaImagen');
                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                $imagen->move('assets/images/users/tranferencias/',$imgName);
                $deposito->rutaImagen = 'assets/images/users/tranferencias/'.$imgName;
            }
            $deposito->validado = 1;
            $deposito->idTrxIngreso = $ingreso->idTrxIngreso;
            $deposito->save();
            toastr()->success('Agregado Correctamente', 'El deposito se agrego correctamente');
            DB::commit();
            return back();
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
            return back();
        }
    }
    public function editar($idTrxDepoTransf,$idUsuario)
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
    	$trxDepositoTransferencia = TrxDepositoTransferencia::find($idTrxDepoTransf);
    	return view('admin.usuarios.validarTransferencia.edit',compact('trxDepositoTransferencia','idUsuario'));

    }
    public function update(Request $request, $idTrxDepoTransf)
    {
    	try {
    		if (Session::has('montoOriginal') && Session::has('nuevoValor') && Session::has('idUsuarioDeposito')) {
    			Session::forget('montoOriginal');
    			Session::forget('nuevoValor');
    			Session::forget('idUsuarioDeposito');
    		}
            $validator = Validator::make($request->all(), [
                'nombreBancoOrigen' => 'required',
                'numeroOperacion'=>'required',
                'bancoOrigen'=>'required',
                'fechaDeposito'=>'required',
                'numeroCuentaBanco'=>'required',
            ]);
            if ($validator->fails()) {
                toastr()->info('No debe dejar campos en blanco, las contraseñas deben ser iguales, la imagen debe pesar menos de 100 mb');
                return back();
            }
            DB::beginTransaction();
            $deposito = TrxDepositoTransferencia::find($idTrxDepoTransf);
            if ($deposito->montoDeposito > $request->montoDeposito || $deposito->montoDeposito < $request->montoDeposito) {
            	Session::put('montoOriginal',$deposito->montoDeposito);
            	Session::put('nuevoValor',$request->montoDeposito);
            	Session::put('idUsuarioDeposito',$request->idUsuario);

            }
            if($request->file('rutaImagen')){
            	if ($deposito->rutaImagen != null) {
	            	unlink($deposito->rutaImagen);
            	}
                $imagen = $request->file('rutaImagen');
                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                $imagen->move('assets/images/users/tranferencias/',$imgName);
                $deposito->rutaImagen = 'assets/images/users/tranferencias/'.$imgName;
            }
            $deposito->fill($request->all());
            $deposito->save();
            if (Session::has('montoOriginal') && Session::has('nuevoValor')) {
	            TrxIngreso::find($deposito->idTrxIngreso)->update([
	            	'monto' => $request->montoDeposito,
			    	'webClient' =>$request->userAgent(),
	            ]);
            }
            toastr()->success('Actualizado Correctamente', 'El deposito se actualizo correctamente');
            DB::commit();
            return redirect::to('napalm/usuarios/'.$request->idUsuario.'/listado-trasferencias');
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
            return back();
        }
    }
    public function destroy($idTrxDepoTransf,$idUsuario)
    {
    	try {
    		DB::beginTransaction();
            $deposito = TrxDepositoTransferencia::find($idTrxDepoTransf);
        	unlink($deposito->rutaImagen);
            $valorTransferencia = $deposito->montoDeposito;
            TrxIngreso::find($deposito->idTrxIngreso)->delete();
            $deposito->delete();
            $obtenerSaldo = SaldoDisponible::where('idUsuario',$idUsuario)->firstOrFail();
            $total = intval($obtenerSaldo->cantidadSaldoDisponible) - intval($valorTransferencia);
            $obtenerSaldo->cantidadSaldoDisponible = $total;
            $obtenerSaldo->save();
    		DB::commit();
            toastr()->success('Eliminado Correctamente', 'El depósito ha sido eliminado correctamente', ['timeOut' => 9000]);
            return back();
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
            return back();
        }
    }
}
