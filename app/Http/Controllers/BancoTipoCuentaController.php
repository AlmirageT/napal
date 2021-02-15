<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\BancoTipoCuenta;
use App\TipoCuenta;
use App\Banco;
use Session;
use DB;

class BancoTipoCuentaController extends Controller
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
        $bancosTiposCuentas = BancoTipoCuenta::select('*')
        	->join('bancos','bancos_tipos_cuentas.idBanco','=','bancos.idBanco')
        	->join('tipos_cuentas','bancos_tipos_cuentas.idTipoCuenta','=','tipos_cuentas.idTipoCuenta')
        	->get();
    	$bancos = Banco::pluck('nombreBanco','idBanco');
    	$tiposCuentas = TipoCuenta::pluck('nombreTipoCuenta','idTipoCuenta');
    	return view('admin.bancoTipoCuenta.index',compact('bancos','tiposCuentas','bancosTiposCuentas'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'idTipoCuenta' => 'required',
                'idBanco' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos vacios');
                return back();
            }
            DB::beginTransaction();
        	$bancoTipoCuenta = new BancoTipoCuenta($request->all());
        	$bancoTipoCuenta->save();
            toastr()->success('Asociación entre banco y tipo cuenta realizado con éxito', 'Agregado Correctamente');
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
    public function update(Request $request, $idBancoTipoCuenta)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'idTipoCuenta' => 'required',
                'idBanco' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos vacios');
                return back();
            }
            DB::beginTransaction();
        	$bancoTipoCuenta = BancoTipoCuenta::find($idBancoTipoCuenta);
        	$bancoTipoCuenta->fill($request->all());
        	$bancoTipoCuenta->save();
            toastr()->success('Asociación entre banco y tipo cuenta realizado con éxito', 'Actualizado Correctamente');
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
    public function destroy($idBancoTipoCuenta)
    {
    	try {
            DB::beginTransaction();
        	$bancoTipoCuenta = BancoTipoCuenta::find($idBancoTipoCuenta);
        	$bancoTipoCuenta->delete();
            toastr()->success('Asociación entre banco y tipo cuenta eliminada con éxito', 'Eliminado Correctamente');
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
}
