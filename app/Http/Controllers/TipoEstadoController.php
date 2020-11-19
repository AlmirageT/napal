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
    	$tiposEstados = TipoEstado::all();
    	return view('admin.mantenedores.tipo_estado.index',compact('tiposEstados'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipoEstado = new TipoEstado($request->all());
            	$tipoEstado->save();
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
	    		$tipoEstado = TipoEstado::find($idTipoEstado);
	            $tipoEstado->fill($request->all());
	            $tipoEstado->save();
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
    			$tipoEstado = TipoEstado::find($idTipoEstado);
	            toastr()->success('Eliminado Correctamente', 'El tipo de flexibilidad: '.$tipoEstado->nombreTipoEstado.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipoEstado->delete();
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
