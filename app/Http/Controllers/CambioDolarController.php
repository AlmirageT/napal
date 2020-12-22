<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\CambioDolar;
use Session;
use DB;

class CambioDolarController extends Controller
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
        $cambiosDolares = CambioDolar::all();
        return view('admin.cambioDolar.index',compact('cambiosDolares'));
    }
    public function store(Request $request)
    {
    	try {
    		$validator = Validator::make($request->all(), [
                'valorCambioDolar' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
    		DB::beginTransaction();
    		$cambioDolar = new CambioDolar($request->all());
    		$cambioDolar->save();
            toastr()->success('Agregado Correctamente', 'Cambio dolar agregado correctamente', ['timeOut' => 5000]);
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
    public function update(Request $request, $idCambioDolar)
    {
    	try {
    		$validator = Validator::make($request->all(), [
                'valorCambioDolar' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
    		DB::beginTransaction();
    		$cambioDolar = CambioDolar::find($idCambioDolar);
    		$cambioDolar->fill($request->all());
    		$cambioDolar->save();
            toastr()->success('Actualizado Correctamente', 'Cambio dolar actualizado correctamente', ['timeOut' => 5000]);
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
    public function destroy($idCambioDolar)
    {
    	try {
    		DB::beginTransaction();
    		$cambioDolar = CambioDolar::find($idCambioDolar);
    		$cambioDolar->delete();
            toastr()->success('Eliminado Correctamente', 'Cambio dolar eliminado correctamente', ['timeOut' => 5000]);
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
