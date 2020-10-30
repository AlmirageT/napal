<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\CasoExitoso;
use App\Propiedad;
use DB;

class CasoExitosoController extends Controller
{
    public function index()
    {  	
    	$casosExitosos = CasoExitoso::select('*')
    	->join('propiedades','casos_exitosos.idPropiedad','=','propiedades.idPropiedad')
		->orderBy('casos_exitosos.idCasoExitoso','DESC')
		->get();    
		$propiedades = Propiedad::where('idEstado',6)->orWhere('idEstado',5)->pluck('nombrePropiedad','idPropiedad');
    	return view('admin.casosExitosos.index',compact('casosExitosos','propiedades'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$casoExitoso = new CasoExitoso($request->all());
            	$casoExitoso->save();
                toastr()->success('Agregado Correctamente', 'Caso exitoso agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idCasoExitoso)
    {
    	try {
            DB::beginTransaction();
	    		$casoExitoso = CasoExitoso::find($idCasoExitoso);
	            $casoExitoso->fill($request->all());
	            $casoExitoso->save();
                toastr()->success('Actualizado Correctamente', 'Caso exitoso actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idCasoExitoso)
    {
    	try {
    		DB::beginTransaction();
    			$casoExitoso = CasoExitoso::find($idCasoExitoso);
	            toastr()->success('Eliminado Correctamente', 'El caso exitoso a sido eliminado correctamente', ['timeOut' => 9000]);
	            $casoExitoso->delete();
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
