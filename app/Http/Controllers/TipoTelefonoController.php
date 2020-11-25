<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\TipoTelefono;
use DB;

class TipoTelefonoController extends Controller
{
    public function index()
    {
    	$tiposTelefonos = TipoTelefono::all();
    	return view('admin.mantenedores.tipo_telefono.index',compact('tiposTelefonos'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreTipoTelefono' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
            	$tipoTelefono = new TipoTelefono($request->all());
            	$tipoTelefono->save();
                toastr()->success('Agregado Correctamente', 'El tipo de telefono: '.$request->nombreTipoTelefono.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idTipoTelefono)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreTipoTelefono' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
	    		$tipoTelefono = TipoTelefono::find($idTipoTelefono);
	            $tipoTelefono->fill($request->all());
	            $tipoTelefono->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de telefono: '.$request->nombreTipoTelefono.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idTipoTelefono)
    {
    	try {
    		DB::beginTransaction();
    			$tipoTelefono = TipoTelefono::find($idTipoTelefono);
	            toastr()->success('Eliminado Correctamente', 'El tipo de telefono: '.$tipoTelefono->nombreTipoTelefono.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipoTelefono->delete();
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
