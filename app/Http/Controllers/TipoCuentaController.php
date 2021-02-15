<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\TipoCuenta;
use App\Banco;
use Session;
use DB;

class TipoCuentaController extends Controller
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
        $tiposCuentas = TipoCuenta::all();
        $bancos = Banco::pluck('nombreBanco','idBanco');
        return view('admin.tipoCuenta.index',compact('tiposCuentas','bancos'));
    }
    public function store(Request $request)
    {
    	try {
    		$validator = Validator::make($request->all(), [
                'nombreTipoCuenta' => 'required',
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
            DB::beginTransaction();
            $tipoCuenta = new TipoCuenta($request->all());
            $tipoCuenta->save();
    		DB::commit();
    		toastr()->success('El tipo de cuenta se ha agregado correctamente','Tipo de Cuenta Agregado Correctamente');
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
    public function update(Request $request, $idTipoCuenta)
    {
    	try {
    		$validator = Validator::make($request->all(), [
                'nombreTipoCuenta' => 'required',
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
            DB::beginTransaction();
            $tipoCuenta = TipoCuenta::find($idTipoCuenta);
            $tipoCuenta->fill($request->all());
            $tipoCuenta->save();
    		DB::commit();
    		toastr()->success('El tipo de cuenta se ha actualizado correctamente','Tipo de Cuenta Actualizado Correctamente');
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
    public function destroy($idTipoCuenta)
    {
    	try {
            DB::beginTransaction();
            $tipoCuenta = TipoCuenta::find($idTipoCuenta);
            $tipoCuenta->delete();
    		DB::commit();
    		toastr()->success('El tipo de cuenta se ha eliminado correctamente','Tipo de Cuenta Eliminado Correctamente');
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
