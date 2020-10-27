<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoEstado;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoEstadoController extends Controller
{
    public function index()
    {
    	$tipos_estados = TipoEstado::all();
    	return view('admin.mantenedores.tipo_estado.index',compact('tipos_estados'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipo_estado = new TipoEstado($request->all());
            	$tipo_estado->save();
                toastr()->success('Agregado Correctamente', 'El tipo de estado: '.$request->nombreTipoEstado.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idTipoEstado)
    {
    	try {
            DB::beginTransaction();
	    		$tipo_estado = TipoEstado::find($idTipoEstado);
	            $tipo_estado->fill($request->all());
	            $tipo_estado->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de estado: '.$request->nombreTipoEstado.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idTipoEstado)
    {
    	try {
    		DB::beginTransaction();
    			$tipo_estado = TipoEstado::find($idTipoEstado);
	            toastr()->success('Eliminado Correctamente', 'El tipo de flexibilidad: '.$tipo_estado->nombreTipoEstado.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_estado->delete();
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
