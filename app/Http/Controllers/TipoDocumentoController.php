<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoDocumento;
use DB;

class TipoDocumentoController extends Controller
{
    public function index()
    {
    	$tipos_documentos = TipoDocumento::all();
    	return view('admin.mantenedores.tipo_documento.index',compact('tipos_documentos'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipo_documento = new TipoDocumento($request->all());
            	$tipo_documento->save();
                toastr()->success('Agregado Correctamente', 'El tipo de documento: '.$request->nombreTipoDocumento.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
            DB::rollback();			
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    		
    	}
    }
    public function update(Request $request, $idTipoDocumento)
    {
    	try {
            DB::beginTransaction();
	    		$tipo_documento = TipoDocumento::find($idTipoDocumento);
	            $tipo_documento->fill($request->all());
	            $tipo_documento->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de documento: '.$request->nombreTipoDocumento.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::back();
    	} catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
    public function destroy($idTipoDocumento)
    {
    	try {
    		DB::beginTransaction();
    			$tipo_documento = TipoDocumento::find($idTipoDocumento);
	            toastr()->success('Eliminado Correctamente', 'El tipo de documento: '.$tipo_documento->nombreTipoDocumento.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_documento->delete();
    		DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
    		DB::rollback();
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
}
