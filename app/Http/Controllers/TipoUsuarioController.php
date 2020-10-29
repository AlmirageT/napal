<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\TipoUsuario;
use DB;

class TipoUsuarioController extends Controller
{
    public function index()
    {
    	$tiposUsuarios = TipoUsuario::all();
    	return view('admin.mantenedores.tipo_usuario.index',compact('tiposUsuarios'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipoUsuario = new TipoUsuario($request->all());
            	$tipoUsuario->save();
                toastr()->success('Agregado Correctamente', 'El tipo de usuario: '.$request->nombreTipoUsuario.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idTipoUsuario)
    {
    	try {
            DB::beginTransaction();
	    		$tipoUsuario = TipoUsuario::find($idTipoUsuario);
	            $tipoUsuario->fill($request->all());
	            $tipoUsuario->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de usuario: '.$request->nombreTipoUsuario.' ha sido actualizado correctamente', ['timeOut' => 9000]);

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
    public function destroy($idTipoUsuario)
    {
    	try {
    		DB::beginTransaction();
    			$tipoUsuario = TipoUsuario::find($idTipoUsuario);
	            toastr()->success('Eliminado Correctamente', 'El proyecto: '.$tipoUsuario->nombreTipoUsuario.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipoUsuario->delete();
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
