<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\TipoInversion;
use DB;

class TipoInversionController extends Controller
{
    public function index()
    {
    	$tiposInversiones = TipoInversion::all();
    	return view('admin.mantenedores.tipo_inversion.index',compact('tiposInversiones'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipoInversion = new TipoInversion($request->all());
            	$tipoInversion->save();
                toastr()->success('Agregado Correctamente', 'El tipo de inversion: '.$request->nombreTipoInversion.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idTipoInversion)
    {
    	try {
            DB::beginTransaction();
	    		$tipoInversion = TipoInversion::find($idTipoInversion);
	            $tipoInversion->fill($request->all());
	            $tipoInversion->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de inversion: '.$request->nombreTipoInversion.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idTipoInversion)
    {
    	try {
    		DB::beginTransaction();
    			$tipoInversion = TipoInversion::find($idTipoInversion);
	            toastr()->success('Eliminado Correctamente', 'El tipo de inversion: '.$tipoInversion->nombreTipoInversion.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipoInversion->delete();
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
