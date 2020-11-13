<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\TrxIngreso;
use Session;
use DB;

class InvierteController extends Controller
{
    public function invierte(Request $request, $idPropiedad)
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            toastr()->info('Debe estar ingresado para poder invertir');
    		return back();
    	}
		try {
            $validator = Validator::make($request->all(), [
                'valorInvertir' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Debes ingresar un valor para invertir');
                return back();
            }
            DB::beginTransaction();
            $caracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
			$sinCaracteres = str_replace($caracteresEspeciales, "", $request->valorInvertir);

            DB::commit();
            return view('confirmar');
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
    public function verificarDatos()
    {
    	return redirect::to('exito');
    }
}
