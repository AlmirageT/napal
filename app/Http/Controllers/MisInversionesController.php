<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;
use App\ImagenPropiedad;
use App\SaldoDisponible;
use App\InstruccionBancaria;
use App\TrxIngreso;
use App\Propiedad;
use Session;

class MisInversionesController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $totalInvertidos = TrxIngreso::where('idUsuario',Session::get('idUsuario'))->where('idPropiedad','<>',null)->get();
        $total = 0;
        foreach ($totalInvertidos as $totalInvertido) {
            $total += $totalInvertido->monto;        
        }
        $proyectosEnFinanciacion = TrxIngreso::select('*')
            ->join('propiedades','trx_ingresos.idPropiedad','=','propiedades.idPropiedad')
            ->where('trx_ingresos.idUsuario',Session::get('idUsuario'))
            ->where('propiedades.idEstado',4)
            ->get();
        $totalProyectoEnFinanciacion = 0;
        foreach ($proyectosEnFinanciacion as $proyectoEnFinanciacion) {
            $totalProyectoEnFinanciacion = $totalProyectoEnFinanciacion + $proyectoEnFinanciacion->monto;
        }

        $propiedadesInvertidas = TrxIngreso::where('idUsuario',Session::get('idUsuario'))->where('idPropiedad','<>',null)->get();
        $arrayIdPropiedad = array();
        foreach ($propiedadesInvertidas as $propiedadInvertida) {
        	$idPropiedades = array(
        		'idPropiedad'=>$propiedadInvertida->idPropiedad
        	);
        	array_push($arrayIdPropiedad,$idPropiedades);
        }
		$arrayIdPropiedadSinDuplicar = array();

		array_push($arrayIdPropiedadSinDuplicar, array_unique($arrayIdPropiedad, SORT_REGULAR));

		$propiedades = Propiedad::select('*')
		->join('estados','propiedades.idEstado','=','estados.idEstado')
		->whereIn('idPropiedad',$arrayIdPropiedadSinDuplicar[0])
		->get();
        $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->get();

        $ingresos = TrxIngreso::all();

		return view('public.misInversiones',compact('propiedades','total','saldoDisponible','totalProyectoEnFinanciacion','ingresos'));

    }
    public function detalle(Request $request)
    {
    	try {
	    	$propiedad = Propiedad::select('*')
                    ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
                    ->join('paises','propiedades.idPais','=','paises.idPais')
                    ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
                    ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
                    ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
                    ->join('estados','propiedades.idEstado','=','estados.idEstado')
                    ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
                    ->join('tipos_calidades','propiedades.idTipoCalidad','=','tipos_calidades.idTipoCalidad')
                    ->where('propiedades.idPropiedad',Crypt::decrypt($request->idPropiedad))
                    ->firstOrFail();
            $instruccionesBancarias = InstruccionBancaria::select('*')
                ->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
                ->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
                ->where('cuentas_bancarias_usuarios.idUsuario',Session::get('idUsuario'))
                ->orderBy('instrucciones_bancarias.idIntruccionBancaria','DESC')
                ->take(3)
                ->get();
            $imagenesPropiedades = ImagenPropiedad::where('idPropiedad',Crypt::decrypt($request->idPropiedad))->get();
            $datos = TrxIngreso::where('idPropiedad',$propiedad->idPropiedad)->get();
            $suma = 0;
            foreach($datos as $dato){
                $suma = $suma + $dato->monto;
            }
            $arrayIdPropiedadUsuario = array();
            foreach ($datos as $dato) {
                if($dato->idPropiedad == $propiedad->idPropiedad && $dato->idPropiedad != null){
                    $idPropiedades = array($propiedad->idPropiedad => $dato->idUsuario
                    );
                    array_push($arrayIdPropiedadUsuario,$idPropiedades);
                }
            }
            $arrayIdPropiedadSinDuplicar = array();
            array_push($arrayIdPropiedadSinDuplicar, array_unique($arrayIdPropiedadUsuario, SORT_REGULAR));
            $datosUsuario = TrxIngreso::where('idPropiedad',$propiedad->idPropiedad)->where('idUsuario',Session::get('idUsuario'))->get();
            $total = 0;
            foreach($datosUsuario as $datoUsuario){
                $total = $total + $datoUsuario->monto;
            }
    		return view('public.miInversionDetalle',compact('propiedad','imagenesPropiedades','arrayIdPropiedadSinDuplicar','suma','total','instruccionesBancarias'));
    	} catch (ModelNotFoundException $e) {
            toastr()->error('Propiedad que busca no existe');
            return back();
        } catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return back();
    	}
    }
}
