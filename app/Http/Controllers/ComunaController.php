<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Comuna;
use App\Provincia;
use App\Region;
use App\Pais;
use DB;

class ComunaController extends Controller
{
    public function index()
    {  	
    	$comunas = Comuna::select('*')
    	->join('provincias','comunas.idProvincia','=','provincias.idProvincia')
		->join('regiones','provincias.idRegion','=','regiones.idRegion')
		->join('paises','regiones.idPais','=','paises.idPais')
		->orderBy('comunas.idComuna','DESC')
		->paginate(10);    
		$provincias = Provincia::pluck('nombreProvincia','idProvincia');
    	$regiones = Region::pluck('nombreRegion','idRegion');
    	$paises = Pais::pluck('nombrePais','idPais');
    	return view('admin.ubicaciones.comunas.index',compact('provincias','regiones','paises','comunas'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$comuna = new Comuna();
            	$comuna->nombreComuna = $request->nombreComuna;
            	$comuna->idProvincia = $request->idProvincia;
            	$comuna->save();
                toastr()->success('Agregado Correctamente', 'El tipo de calidad: '.$request->nombreComuna.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idComuna)
    {
    	try {
            DB::beginTransaction();
	    		$comuna = Comuna::find($idComuna);
	            $comuna->nombreComuna = $request->nombreComuna;
            	$comuna->idProvincia = $request->idProvincia;
	            $comuna->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de calidad: '.$request->nombreComuna.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idComuna)
    {
    	try {
    		DB::beginTransaction();
    			$comuna = Comuna::find($idComuna);
	            toastr()->success('Eliminado Correctamente', 'El tipo de calidad: '.$comuna->nombreComuna.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $comuna->delete();
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
