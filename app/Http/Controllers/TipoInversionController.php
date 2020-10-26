<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoInversion;
use DB;

class TipoInversionController extends Controller
{
    public function index()
    {
    	$tipos_inversiones = TipoInversion::all();
    	return view('admin.mantenedores.tipo_inversion.index',compact('tipos_inversiones'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipo_inversion = new TipoInversion($request->all());
            	$tipo_inversion->save();
                toastr()->success('Agregado Correctamente', 'El tipo de inversion: '.$request->nombreTipoInversion.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
            DB::rollback();			
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    		
    	}
    }
    public function update(Request $request, $idTipoInversion)
    {
    	try {
            DB::beginTransaction();
	    		$tipo_inversion = TipoInversion::find($idTipoInversion);
	            $tipo_inversion->fill($request->all());
	            $tipo_inversion->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de inversion: '.$request->nombreTipoInversion.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::back();
    	} catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
    public function destroy($idTipoInversion)
    {
    	try {
    		DB::beginTransaction();
    			$tipo_inversion = TipoInversion::find($idTipoInversion);
	            toastr()->success('Eliminado Correctamente', 'El tipo de inversion: '.$tipo_inversion->nombreTipoInversion.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_inversion->delete();
    		DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
    		DB::rollback();
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
}
