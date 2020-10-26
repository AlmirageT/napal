<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\ParametroGeneral;

class ParametroGeneralController extends Controller
{
    public function index()
    {
    	$parametros_generales = ParametroGeneral::all();
    	return view('admin.parametros_generales.index',compact('parametros_generales'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$parametro_general = new ParametroGeneral($request->all());
            	$parametro_general->save();
                toastr()->success('Agregado Correctamente', 'El parametro general: '.$request->nombreParametroGeneral.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
            DB::rollback();			
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    		
    	}
    }
    public function update(Request $request, $idParametroGeneral)
    {
    	try {
            DB::beginTransaction();
	    		$parametro_general = ParametroGeneral::find($idParametroGeneral);
	            $parametro_general->fill($request->all());
	            $parametro_general->save();
                toastr()->success('Agregado Correctamente', 'El parametro general: '.$request->nombreParametroGeneral.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::back();
    	} catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
    public function destroy($idParametroGeneral)
    {
    	try {
    		DB::beginTransaction();
    			$parametro_general = ParametroGeneral::find($idParametroGeneral);
	            toastr()->success('Eliminado Correctamente', 'El parametro general: '.$parametro_general->nombreParametroGeneral.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $parametro_general->delete();
    		DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
    		DB::rollback();
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
}
