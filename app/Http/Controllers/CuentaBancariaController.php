<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\CuentaBancariaUsuario;
use App\TipoCuenta;
use App\Pais;
use Session;
use DB;

class CuentaBancariaController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
    	$paises = Pais::pluck('nombrePais','idPais');
    	$tiposCuentas = TipoCuenta::pluck('nombreTipoCuenta','idTipoCuenta');
    	return view('public.añadirCuentaBancaria',compact('paises','tiposCuentas'));
    }

    public function store(Request $request)
    {
    	try {
    		$validator = Validator::make($request->all(), [
                'idPais' => 'required',
                'idBanco' => 'required',
                'idTipoCuenta' => 'required',
                'numeroCuenta' => 'required',
                'codigoSwift' => 'required',
                'titular' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
            $cantidadCuentas = CuentaBancariaUsuario::where('idUsuario',Session::get('idUsuario'))->get();
            if (count($cantidadCuentas) == 4) {
                toastr()->warning('Solo se pueden tener 4 cuentas bancarias asociadas');
                return back();
            }
    		DB::beginTransaction();
    		$cuentaBancariaUsuario = new CuentaBancariaUsuario($request->all());
    		$cuentaBancariaUsuario->idUsuario = Session::get('idUsuario');
    		$cuentaBancariaUsuario->save();
            toastr()->success('Cuenta bancaria enviada a revisión de forma correcta', 'Agregado Correctamente');
    		DB::commit();
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
