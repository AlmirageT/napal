<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\ParametroGeneral;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ParametroGeneralController extends Controller
{
    public function index()
    {
    	$parametrosGenerales = ParametroGeneral::all();
    	return view('admin.parametros_generales.index',compact('parametrosGenerales'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$parametroGeneral = new ParametroGeneral($request->all());
            	$parametroGeneral->save();
                toastr()->success('Agregado Correctamente', 'El parametro general: '.$request->nombreParametroGeneral.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idParametroGeneral)
    {
    	try {
            DB::beginTransaction();
	    		$parametroGeneral = ParametroGeneral::find($idParametroGeneral);
	            $parametroGeneral->fill($request->all());
	            $parametroGeneral->save();
                toastr()->success('Agregado Correctamente', 'El parametro general: '.$request->nombreParametroGeneral.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idParametroGeneral)
    {
    	try {
    		DB::beginTransaction();
    			$parametroGeneral = ParametroGeneral::find($idParametroGeneral);
	            toastr()->success('Eliminado Correctamente', 'El parametro general: '.$parametroGeneral->nombreParametroGeneral.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $parametroGeneral->delete();
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
