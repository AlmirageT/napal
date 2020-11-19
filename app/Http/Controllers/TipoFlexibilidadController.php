<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoFlexibilidad;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoFlexibilidadController extends Controller
{
    public function index()
    {
    	$tiposFlexibilidades = TipoFlexibilidad::all();
    	return view('admin.mantenedores.tipo_flexibilidad.index',compact('tiposFlexibilidades'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipoFlexibilidad = new TipoFlexibilidad($request->all());
            	$tipoFlexibilidad->save();
                toastr()->success('Agregado Correctamente', 'El tipo de flexibilidad: '.$request->nombreTipoFlexibilidad.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idTipoFlexibilidad)
    {
    	try {
            DB::beginTransaction();
	    		$tipoFlexibilidad = TipoFlexibilidad::find($idTipoFlexibilidad);
	            $tipoFlexibilidad->fill($request->all());
	            $tipoFlexibilidad->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de flexibilidad: '.$request->nombreTipoFlexibilidad.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idTipoFlexibilidad)
    {
    	try {
    		DB::beginTransaction();
    			$tipoFlexibilidad = TipoFlexibilidad::find($idTipoFlexibilidad);
	            toastr()->success('Eliminado Correctamente', 'El tipo de flexibilidad: '.$tipoFlexibilidad->nombreTipoFlexibilidad.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipoFlexibilidad->delete();
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
