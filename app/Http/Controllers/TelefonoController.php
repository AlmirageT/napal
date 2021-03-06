<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Telefono;
use App\TipoTelefono;
use Session;
use DB;

class TelefonoController extends Controller
{
    public function create($idUsuario)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
    	$telefonos = Telefono::select('*')
    	->join('usuarios','telefonos.idUsuario','=','usuarios.idUsuario')
    	->join('tipo_telefonos','telefonos.idTipoTelefono','=','tipo_telefonos.idTipoTelefono')
    	->where('telefonos.idUsuario',$idUsuario)
        ->orderBy('telefonos.idTelefono','DESC')
    	->get();
    	$tiposTelefonos = TipoTelefono::pluck('nombreTipoTelefono','idTipoTelefono');
    	return view('admin.telefonos.create',compact('telefonos','tiposTelefonos','idUsuario'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$telefono = new Telefono($request->all());
            	$telefono->save();
                toastr()->success('Agregado Correctamente', 'El telefono: '.$request->numero.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::to('napalm/usuarios/telefonos/'.$request->idUsuario);
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
    public function update(Request $request, $idTelefono)
    {
    	try {
            DB::beginTransaction();
	    		$telefono = Telefono::find($idTelefono);
	            $telefono->fill($request->all());
	            $telefono->save();
                toastr()->success('Actualizado Correctamente', 'El t??lefono: '.$request->numero.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::to('napalm/usuarios/telefonos/'.$request->idUsuario);
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
    public function destroy($idTelefono)
    {
    	try {
    		DB::beginTransaction();
    			$telefono = Telefono::find($idTelefono);
	            toastr()->success('Eliminado Correctamente', 'El t??lefono: '.$telefono->numero.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $telefono->delete();
    		DB::commit();
            return redirect::to('napalm/usuarios/telefonos/'.$telefono->idUsuario);
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
