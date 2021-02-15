<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrxIngreso;
use App\SaldoDisponible;
use App\Propiedad;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
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

        $totalInvertidos = TrxIngreso::where('idUsuario',Session::get('idUsuario'))->where('idPropiedad','<>',null)->get();
        $total = 0;
        foreach ($totalInvertidos as $totalInvertido) {
            $total += $totalInvertido->monto;        
        }
        $propiedades = Propiedad::select('*')
        ->join('estados','propiedades.idEstado','=','estados.idEstado')
        ->whereIn('idPropiedad',$arrayIdPropiedadSinDuplicar[0])
        ->get();

        $proyectosFinanciados = TrxIngreso::select('*')
        ->join('propiedades','trx_ingresos.idPropiedad','=','propiedades.idPropiedad')
        ->where('trx_ingresos.idUsuario',Session::get('idUsuario'))
        ->where('propiedades.idEstado',5)
        ->get();
        $totalProyectoFinanciado = 0;
        foreach ($proyectosFinanciados as $proyectoFinanciado) {
            $totalProyectoFinanciado += $proyectoFinanciado->monto;
        }


        $proyectosEnFinanciacion = TrxIngreso::select('*')
        ->join('propiedades','trx_ingresos.idPropiedad','=','propiedades.idPropiedad')
        ->where('trx_ingresos.idUsuario',Session::get('idUsuario'))
        ->where('propiedades.idEstado',4)
        ->get();
        $totalProyectoEnFinanciacion = 0;
        foreach ($proyectosEnFinanciacion as $proyectoEnFinanciacion) {
            $totalProyectoEnFinanciacion = $proyectoEnFinanciacion->monto;
        }


        $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->get();
        return view('public.dashboard',compact('arrayIdPropiedadSinDuplicar','total','saldoDisponible','totalProyectoFinanciado','totalProyectoEnFinanciacion','propiedades'));

    }
}
