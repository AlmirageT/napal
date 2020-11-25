<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\TipoDocumento;
use DB;

class TipoDocumentoController extends Controller
{
    public function index()
    {
    	$tiposDocumentos = TipoDocumento::all();
    	return view('admin.mantenedores.tipo_documento.index',compact('tiposDocumentos'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreTipoDocumento' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
            	$tipoDocumento = new TipoDocumento($request->all());
            	$tipoDocumento->save();
                toastr()->success('Agregado Correctamente', 'El tipo de documento: '.$request->nombreTipoDocumento.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idTipoDocumento)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreTipoDocumento' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
	    		$tipoDocumento = TipoDocumento::find($idTipoDocumento);
	            $tipoDocumento->fill($request->all());
	            $tipoDocumento->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de documento: '.$request->nombreTipoDocumento.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idTipoDocumento)
    {
    	try {
    		DB::beginTransaction();
    			$tipoDocumento = TipoDocumento::find($idTipoDocumento);
	            toastr()->success('Eliminado Correctamente', 'El tipo de documento: '.$tipoDocumento->nombreTipoDocumento.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipoDocumento->delete();
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
