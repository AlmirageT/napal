<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\TipoPersona;
use DB;

class TipoPersonaController extends Controller
{
    public function index()
    {
    	$tiposPersonas = TipoPersona::all();
    	return view('admin.mantenedores.tipo_persona.index',compact('tiposPersonas'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipoPersona = new TipoPersona($request->all());
            	$tipoPersona->save();
                toastr()->success('Agregado Correctamente', 'El tipo de persona: '.$request->nombreTipoPersona.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idTipoPersona)
    {
    	try {
            DB::beginTransaction();
	    		$tipoPersona = TipoPersona::find($idTipoPersona);
	            $tipoPersona->fill($request->all());
	            $tipoPersona->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de persona: '.$request->nombreTipoPersona.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::back();
    	}catch (ModelNotFoundException $e) {
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
    public function destroy($idTipoPersona)
    {
    	try {
    		DB::beginTransaction();
    			$tipoPersona = TipoPersona::find($idTipoPersona);
	            toastr()->success('Eliminado Correctamente', 'El tipo de persona: '.$tipoPersona->nombreTipoPersona.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipoPersona->delete();
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
