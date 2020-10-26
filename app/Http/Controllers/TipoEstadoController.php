<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoEstado;
use DB;

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
    	} catch (Exception $e) {
            DB::rollback();			
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
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
    	} catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
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
    	} catch (Exception $e) {
    		DB::rollback();
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
}
