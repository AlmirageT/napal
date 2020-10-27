<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoDocumento;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            DB::beginTransaction();
	    		$tipo_documento = TipoDocumento::find($idTipoDocumento);
	            $tipo_documento->fill($request->all());
	            $tipo_documento->save();
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
    			$tipo_documento = TipoDocumento::find($idTipoDocumento);
	            toastr()->success('Eliminado Correctamente', 'El tipo de documento: '.$tipo_documento->nombreTipoDocumento.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_documento->delete();
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
