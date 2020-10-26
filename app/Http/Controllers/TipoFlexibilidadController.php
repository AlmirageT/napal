<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoFlexibilidad;
use DB;

class TipoFlexibilidadController extends Controller
{
    public function index()
    {
    	$tipos_flexibilidades = TipoFlexibilidad::all();
    	return view('admin.mantenedores.tipo_flexibilidad.index',compact('tipos_flexibilidades'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipo_flexibilidad = new TipoFlexibilidad($request->all());
            	$tipo_flexibilidad->save();
                toastr()->success('Agregado Correctamente', 'El tipo de flexibilidad: '.$request->nombreTipoFlexibilidad.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
            DB::rollback();			
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    		
    	}
    }
    public function update(Request $request, $idTipoFlexibilidad)
    {
    	try {
            DB::beginTransaction();
	    		$tipo_flexibilidad = TipoFlexibilidad::find($idTipoFlexibilidad);
	            $tipo_flexibilidad->fill($request->all());
	            $tipo_flexibilidad->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de flexibilidad: '.$request->nombreTipoFlexibilidad.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::back();
    	} catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
    public function destroy($idTipoFlexibilidad)
    {
    	try {
    		DB::beginTransaction();
    			$tipo_flexibilidad = TipoFlexibilidad::find($idTipoFlexibilidad);
	            toastr()->success('Eliminado Correctamente', 'El tipo de flexibilidad: '.$tipo_flexibilidad->nombreTipoFlexibilidad.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_flexibilidad->delete();
    		DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
    		DB::rollback();
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
}
