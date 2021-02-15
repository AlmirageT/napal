<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Banco;
use App\Pais;
use Session;
use DB;

class BancoController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
        $bancos = Banco::select('*')
        	->join('paises','paises.idPais','=','bancos.idPais')
        	->get();
        $paises = Pais::pluck('nombrePais','idPais');
    	return view('admin.bancos.index',compact('paises','bancos'));
    }
    public function store(Request $request)
    {
    	try {
    		$validator = Validator::make($request->all(), [
                'nombreBanco' => 'required',
                'idPais' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
            DB::beginTransaction();
            $banco = new Banco($request->all());
            $banco->save();
    		DB::commit();
    		toastr()->success('El banco se ha agregado correctamente','Banco Agregado Correctamente');
    		return back();
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
            return back();
        }
    }
    public function update(Request $request, $idBanco)
    {
    	try {
    		$validator = Validator::make($request->all(), [
                'nombreBanco' => 'required',
                'idPais' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
            DB::beginTransaction();
            $banco = Banco::find($idBanco);
            $banco->fill($request->all());
            $banco->save();
    		DB::commit();
    		toastr()->success('El banco se ha actualizado correctamente','Banco Actualizado Correctamente');
    		return back();
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
            return back();
        }
    }
    public function destroy($idBanco)
    {
    	try {
            DB::beginTransaction();
            $banco = Banco::find($idBanco);
            $banco->delete();
    		DB::commit();
    		toastr()->success('El banco se ha eliminado correctamente','Banco Eliminado Correctamente');
    		return back();
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
            return back();
        }
    }
}
