<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\MisionEmpresa;
use Cache;
use Session;
use DB;

class MisionEmpresaController extends Controller
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
		$misionesEmpresas = MisionEmpresa::all();
		return view('admin.misionEmpresa.index',compact('misionesEmpresas'));
	}
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'textoMisionEmpresa' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return redirect::back();
            }
            DB::beginTransaction();
            if(cache::has('riesgoAdvertencia')){
                cache::forget('riesgoAdvertencia');
            }
            	$misionEmpresa = new MisionEmpresa($request->all());
            	$misionEmpresa->save();
                toastr()->success('Agregado Correctamente', 'Mision empresa agrergado correctamente', ['timeOut' => 5000]);
            DB::commit();
            return redirect::back();
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
    public function update(Request $request, $idMisionEmpresa)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'textoMisionEmpresa' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return redirect::back();
            }
            DB::beginTransaction();
            if(cache::has('riesgoAdvertencia')){
                cache::forget('riesgoAdvertencia');
            }
	    		$misionEmpresa = MisionEmpresa::find($idMisionEmpresa);
	            $misionEmpresa->fill($request->all());
	            $misionEmpresa->save();
                toastr()->success('Actualizado Correctamente', 'Mision empresa actualizada correctamente', ['timeOut' => 5000]);
            DB::commit();
        	return redirect::back();
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
    public function destroy($idMisionEmpresa)
    {
    	try {
            DB::beginTransaction();
            if(cache::has('riesgoAdvertencia')){
                cache::forget('riesgoAdvertencia');
            }
    			$misionEmpresa = MisionEmpresa::find($idMisionEmpresa);
	            toastr()->success('Eliminado Correctamente', 'La mision de la empresa ha sido eliminado', ['timeOut' => 5000]);
	            $misionEmpresa->delete();
    		DB::commit();
            return redirect::back();
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

}
