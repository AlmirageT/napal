<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoTelefono;
use DB;

class TipoTelefonoController extends Controller
{
    public function index()
    {
    	$tipos_telefonos = TipoTelefono::all();
    	return view('admin.mantenedores.tipo_telefono.index',compact('tipos_telefonos'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipo_telefono = new TipoTelefono($request->all());
            	$tipo_telefono->save();
                toastr()->success('Agregado Correctamente', 'El tipo de telefono: '.$request->nombreTipoTelefono.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
            DB::rollback();			
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    		
    	}
    }
    public function update(Request $request, $idTipoTelefono)
    {
    	try {
            DB::beginTransaction();
	    		$tipo_telefono = TipoTelefono::find($idTipoTelefono);
	            $tipo_telefono->fill($request->all());
	            $tipo_telefono->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de telefono: '.$request->nombreTipoTelefono.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::back();
    	} catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
    public function destroy($idTipoTelefono)
    {
    	try {
    		DB::beginTransaction();
    			$tipo_telefono = TipoTelefono::find($idTipoTelefono);
	            toastr()->success('Eliminado Correctamente', 'El tipo de telefono: '.$tipo_telefono->nombreTipoTelefono.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_telefono->delete();
    		DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
    		DB::rollback();
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
}
