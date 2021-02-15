<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CodigoPromocional;
use App\Codigo;
use Session;
use DB;

class PromoAmigoController extends Controller
{
    public function index()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        return view('public.invitaUnAmigo');
    }
    public function misPromociones()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $codigosUsuarios = CodigoPromocional::select('*')
            ->join('codigos','codigos_promocionales.idCodigo','=','codigos.idCodigo')
            ->where('codigos_promocionales.idUsuario',Session::get('idUsuario'))
            ->get();
        return view('public.misPromociones',compact('codigosUsuarios'));
    }
    public function codigoPromocional(Request $request)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        try {
            $validator = Validator::make($request->all(), [
                'codigo' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No pueden quedar los datos en blanco');
                return back();
            }
            DB::beginTransaction();
            $codigo = Codigo::where('codigo',$request->codigo)->get();
            if(count($codigo) == 0){
                toastr()->warning('No existe el código ingresado');
                DB::rollback();
                return back();
            }
            $fecha = date('Y-m-d',strtotime($codigo->first()->fechaVencimiento));
            $hoy = date('Y-m-d');
            if ($hoy <= $fecha) {
                $codigosUsuarios = CodigoPromocional::select('*')
                    ->join('codigos','codigos_promocionales.idCodigo','=','codigos.idCodigo')
                    ->where('codigos.codigo',$request->codigo)
                    ->where('codigos_promocionales.idUsuario',Session::get('idUsuario'))
                    ->get();
                if(count($codigosUsuarios)>0){
                    toastr()->warning('Este código ya lo ingreso con anterioridad');
                    DB::rollback();
                    return back();
                }
                CodigoPromocional::create([
                    'idUsuario'=> Session::get('idUsuario'),
                    'idCodigo'=> $codigo->first()->idCodigo
                ]);
            }else{
                toastr()->warning('El codigo promocional que esta tratando de ingresar ya no es valido');
                DB::rollback();
                return back();
            }
            
            toastr()->success('El código ingresado ha sido validado correctamente', 'Código Encontrado');
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
            return redirect::back();
        }
        
    }

}
