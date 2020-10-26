<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Moneda;
use DB;

class MonedaController extends Controller
{
    public function index()
    {
    	$monedas = Moneda::all();
    	return view('admin.mantenedores.moneda.index',compact('monedas'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$moneda = new Moneda($request->all());
            	$moneda->save();
                toastr()->success('Agregado Correctamente', 'La moneda: '.$request->nombreMoneda.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
            DB::rollback();			
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    		
    	}
    }
    public function update(Request $request, $idMoneda)
    {
    	try {
            DB::beginTransaction();
	    		$moneda = Moneda::find($idMoneda);
	            $moneda->fill($request->all());
	            $moneda->save();
                toastr()->success('Actualizado Correctamente', 'La moneda: '.$request->nombreMoneda.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::back();
    	} catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
    public function destroy($idMoneda)
    {
    	try {
    		DB::beginTransaction();
    			$moneda = Moneda::find($idMoneda);
	            toastr()->success('Eliminado Correctamente', 'La moneda: '.$moneda->nombreMoneda.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $moneda->delete();
    		DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
    		DB::rollback();
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
}
