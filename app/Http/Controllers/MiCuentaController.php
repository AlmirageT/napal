<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\CuentaBancariaUsuario;
use App\InstruccionBancaria;
use App\SaldoDisponible;
use App\Banco;
use Session;
use DB;

class MiCuentaController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->get();
        $cuentaBancariaUsuario = CuentaBancariaUsuario::where('idUsuario',Session::get('idUsuario'))->get();
        $instruccionesBancarias = InstruccionBancaria::select('*')
        ->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
        ->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
        ->where('cuentas_bancarias_usuarios.idUsuario',Session::get('idUsuario'))
        ->orderBy('instrucciones_bancarias.idIntruccionBancaria','DESC')
        ->take(3)
        ->get();
        return view('public.miCuenta',compact('saldoDisponible','cuentaBancariaUsuario','instruccionesBancarias'));
    }
    public function cuentaAsociada()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $cuentaBancariaUsuario = CuentaBancariaUsuario::where('idUsuario',Session::get('idUsuario'))->get();
    	return view('public.cuentasAsociadas',compact('cuentaBancariaUsuario'));
    }
    public function retiro()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $idBanco = CuentaBancariaUsuario::where('idUsuario',Session::get('idUsuario'))->pluck('idBanco');
        $bancos = Banco::whereIn('idBanco',$idBanco)->get();
        $cuentasBancarias = CuentaBancariaUsuario::select('*')
        	->join('tipos_cuentas','cuentas_bancarias_usuarios.idTipoCuenta','=','tipos_cuentas.idTipoCuenta')
        	->where('cuentas_bancarias_usuarios.idUsuario',Session::get('idUsuario'))
        	->get();
        $arrayOptBanco = array();
        for ($i=0; $i < count($bancos); $i++) { 
        	foreach ($cuentasBancarias as $cuentaBancaria) {
        		if ($bancos[$i]->idBanco == $cuentaBancaria->idBanco) {
	        		$array = array(
	        			'idCuentaBancariaUsuario' => $cuentaBancaria->idCuentaBancariaUsuario,
	        			'nombreTipoCuenta' => $cuentaBancaria->nombreTipoCuenta,
	        			'numeroCuenta' => $cuentaBancaria->numeroCuenta
	        		);
	        		if (array_key_exists($i, $arrayOptBanco)) {
	        			array_push($arrayOptBanco[$i]['tipoCuentas'], $array);
	        		}else{
	        			$arrayOptBanco[$i]['tipoCuentas'] = array($array);
	        			$arrayOptBanco[$i]['banco'] = $bancos[$i]->nombreBanco;

	        		}
        		}
        	}
        }
    	return view('public.retiros',compact('arrayOptBanco'));
    }
    public function store(Request $request)
    {
    	try {
    		$validator = Validator::make($request->all(), [
                'idCuentaBancariaUsuario' => 'required',
                'concepto' => 'required',
                'importe' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
            $revisarSaldo = SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->firstOrFail();
            if ($request->importe > $revisarSaldo->cantidadSaldoDisponible  ) {
            	toastr()->warning('No posee saldo suficiente para realizar esta acción');
            	return back();
            }
    		DB::beginTransaction();
    		$instruccionBancaria = new InstruccionBancaria($request->all());
            $instruccionBancaria->validado = 0;
    		$instruccionBancaria->cancelada = 0;
            $instruccionBancaria->fechaSolicitud = date("Y-m-d H:i:s");
    		$instruccionBancaria->save();
            toastr()->success('Cuenta bancaria enviada a revisión de forma correcta', 'Solicitud Agregado Correctamente');
    		DB::commit();
            return redirect::to('dashboard/mi-cuenta');
    	} catch (ModelNotFoundException $e) {
            toastr()->warning('No posee saldo para realizar esta acción');
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
    public function cancelarSolicitud($idIntruccionBancaria)
    {
       if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        InstruccionBancaria::find(Crypt::decrypt($idIntruccionBancaria))->update([
            'cancelada'=>1
        ]);
        toastr()->success('Solicitud cancelada de forma correcta', 'Solicitud Cancelada Correctamente');
        return back();

    }
    public function todosLosMovimientos()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $instruccionesBancarias = InstruccionBancaria::select('*')
        ->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
        ->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
        ->where('cuentas_bancarias_usuarios.idUsuario',Session::get('idUsuario'))
        ->orderBy('instrucciones_bancarias.idIntruccionBancaria','DESC')
        ->paginate(10);

        return view('public.misMovimientos',compact('instruccionesBancarias'));

    }
}
