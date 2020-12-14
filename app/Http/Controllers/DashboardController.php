<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrxIngreso;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $propiedadesInvertidas = TrxIngreso::where('idUsuario',Session::get('idUsuario'))->get();
        $arrayPropiedadesInvertidas = array();
        $arrayIdPropiedad = array();
        foreach ($propiedadesInvertidas as $propiedadInvertida) {
        	$idPropiedades = array(
        		'idPropiedad'=>$propiedadInvertida->idPropiedad
        	);
        	array_push($arrayIdPropiedad,$idPropiedades);
        }
		$arrayIdPropiedadSinDuplicar = array();

		array_push($arrayIdPropiedadSinDuplicar, array_unique($arrayIdPropiedad, SORT_REGULAR));


        return view('public.dashboard',compact('arrayIdPropiedadSinDuplicar'));

    }
}
