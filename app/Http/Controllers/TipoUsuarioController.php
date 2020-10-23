<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoUsuario;
use DB;

class TipoUsuarioController extends Controller
{
    public function index()
    {
    	$tipos_usuarios = TipoUsuario::all();
    	return view('admin.mantenedores.tipo_usuario.index',compact('tipos_usuarios'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipo_usuario = new TipoUsuario($request->all());
            	$tipo_usuario->save();
                toastr()->success('Agregado Correctamente', 'El tipo de usuario: '.$request->nombreTipoUsuario.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
            DB::rollback();			
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    		
    	}
    }
    public function update(Request $request, $idTipoUsuario)
    {
    	try {
            DB::beginTransaction();
	    		$tipo_usuario = TipoUsuario::find($idTipoUsuario);
	            $tipo_usuario->fill($request->all());
	            $tipo_usuario->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de usuario: '.$request->nombreTipoUsuario.' ha sido actualizado correctamente', ['timeOut' => 9000]);

            DB::commit();
        	return redirect::back();
    	} catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
    public function destroy($idTipoUsuario)
    {
    	try {
    		DB::beginTransaction();
    			$tipo_usuario = TipoUsuario::find($idTipoUsuario);
	            toastr()->success('Eliminado Correctamente', 'El proyecto: '.$tipo_usuario->nombreTipoUsuario.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $tipo_usuario->delete();
    		DB::commit();
            return redirect::back();
    	} catch (Exception $e) {
    		DB::rollback();
    		toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
    	}
    }
}
