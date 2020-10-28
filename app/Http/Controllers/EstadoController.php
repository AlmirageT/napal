<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Estado;
use App\TipoEstado;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;

class EstadoController extends Controller
{
    public function index()
    {
    	$estados = Estado::select('*')
    	->join('tipos_estados','estados.idTipoEstado','=','tipos_estados.idTipoEstado')
        ->orderBy('estados.idEstado','DESC')
    	->get(); 
    	$tipos_estados = TipoEstado::pluck('nombreTipoEstado','idTipoEstado');
    	return view('admin.mantenedores.estado.index',compact('estados','tipos_estados'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$estado = new Estado($request->all());
            	$estado->save();
                toastr()->success('Agregado Correctamente', 'El estado: '.$request->nombreEstado.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idEstado)
    {
    	try {
            DB::beginTransaction();
	    		$estado = Estado::find($idEstado);
	            $estado->fill($request->all());
	            $estado->save();
                toastr()->success('Actualizado Correctamente', 'El estado: '.$request->nombreEstado.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idEstado)
    {
    	try {
    		DB::beginTransaction();
    			$estado = Estado::find($idEstado);
	            toastr()->success('Eliminado Correctamente', 'El estado: '.$estado->nombreEstado.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $estado->delete();
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
}
