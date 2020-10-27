<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoPersona;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoPersonaController extends Controller
{
    public function index()
    {
    	$tipos_personas = TipoPersona::all();
    	return view('admin.mantenedores.tipo_persona.index',compact('tipos_personas'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipo_persona = new TipoPersona($request->all());
            	$tipo_persona->save();
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
	    		$tipo_persona = TipoPersona::find($idTipoPersona);
	            $tipo_persona->fill($request->all());
	            $tipo_persona->save();
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
    			$tipo_persona = TipoPersona::find($idTipoPersona);
	            toastr()->success('Eliminado Correctamente', 'El tipo de persona: '.$tipo_persona->nombreTipoPersona.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_persona->delete();
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
