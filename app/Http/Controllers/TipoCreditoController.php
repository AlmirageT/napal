<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoCredito;
use DB;

class TipoCreditoController extends Controller
{
    public function index()
    {
    	$tipos_creditos = TipoCredito::all();
    	return view('admin.mantenedores.tipo_credito.index',compact('tipos_creditos'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipo_credito = new TipoCredito($request->all());
            	$tipo_credito->save();
                toastr()->success('Agregado Correctamente', 'El tipo de crédito: '.$request->nombreTipoCredito.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
            DB::rollback();			
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    		
    	}
    }
    public function update(Request $request, $idTipoCredito)
    {
    	try {
            DB::beginTransaction();
	    		$tipo_credito = TipoCredito::find($idTipoCredito);
	            $tipo_credito->fill($request->all());
	            $tipo_credito->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de crédito: '.$request->nombreTipoCredito.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::back();
    	} catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
    public function destroy($idTipoCredito)
    {
    	try {
    		DB::beginTransaction();
    			$tipo_credito = TipoCredito::find($idTipoCredito);
	            toastr()->success('Eliminado Correctamente', 'El tipo de crédito: '.$tipo_credito->nombreTipoCredito.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_credito->delete();
    		DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
    		DB::rollback();
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
}
