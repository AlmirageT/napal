<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoCalidad;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoCalidadController extends Controller
{
    public function index()
    {
    	$tipos_calidades = TipoCalidad::all();
    	return view('admin.mantenedores.tipo_calidad.index',compact('tipos_calidades'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipo_calidad = new TipoCalidad($request->all());
            	$tipo_calidad->save();
                toastr()->success('Agregado Correctamente', 'El tipo de calidad: '.$request->nombreTipoCalidad.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idTipoCalidad)
    {
    	try {
            DB::beginTransaction();
	    		$tipo_calidad = TipoCalidad::find($idTipoCalidad);
	            $tipo_calidad->fill($request->all());
	            $tipo_calidad->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de calidad: '.$request->nombreTipoCalidad.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idTipoCalidad)
    {
    	try {
    		DB::beginTransaction();
    			$tipo_calidad = TipoCalidad::find($idTipoCalidad);
	            toastr()->success('Eliminado Correctamente', 'El tipo de calidad: '.$tipo_calidad->nombreTipoCalidad.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_calidad->delete();
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
