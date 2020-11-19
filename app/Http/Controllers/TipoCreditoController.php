<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoCredito;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoCreditoController extends Controller
{
    public function index()
    {
    	$tiposCreditos = TipoCredito::all();
    	return view('admin.mantenedores.tipo_credito.index',compact('tiposCreditos'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipoCredito = new TipoCredito($request->all());
            	$tipoCredito->save();
                toastr()->success('Agregado Correctamente', 'El tipo de crédito: '.$request->nombreTipoCredito.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idTipoCredito)
    {
    	try {
            DB::beginTransaction();
	    		$tipoCredito = TipoCredito::find($idTipoCredito);
	            $tipoCredito->fill($request->all());
	            $tipoCredito->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de crédito: '.$request->nombreTipoCredito.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idTipoCredito)
    {
    	try {
    		DB::beginTransaction();
    			$tipoCredito = TipoCredito::find($idTipoCredito);
	            toastr()->success('Eliminado Correctamente', 'El tipo de crédito: '.$tipoCredito->nombreTipoCredito.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipoCredito->delete();
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
