<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropiedadFavorita;
use App\TrxIngreso;
use Session;

class PropiedadFavoritaController extends Controller
{
    public function index($idPropiedad)
    {
    	$propiedadFavorita = PropiedadFavorita::where('idPropiedad',$idPropiedad)->get();
    	if (count($propiedadFavorita)>0) {
    		PropiedadFavorita::find($propiedadFavorita->first()->idPropiedadFavorita)->delete();
    		return response()->json(false);
    	}else{
    		PropiedadFavorita::create([
    			'idPropiedad' => $idPropiedad,
    			'idUsuario' => Session::get('idUsuario')
    		]);
    		return response()->json(true);

    	}
	}
	public function favoritos()
	{
		if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
		$propiedadesFavoritas = PropiedadFavorita::select('*')
		->join('propiedades','propiedades_favoritas.idPropiedad','=','propiedades.idPropiedad')
		->join('paises','propiedades.idPais','=','paises.idPais')
		->join('regiones','propiedades.idRegion','=','regiones.idRegion')
		->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
		->join('comunas','propiedades.idComuna','=','comunas.idComuna')
		->join('estados','propiedades.idEstado','=','estados.idEstado')
		->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
		->join('tipos_calidades','propiedades.idTipoCalidad','=','tipos_calidades.idTipoCalidad')
		->orderBy('propiedades.idPropiedad','DESC')
		->where('propiedades.idEstado',4)
		->where('propiedades_favoritas.idUsuario',Session::get('idUsuario'))
		->get();
        $ingresos = TrxIngreso::all();

		return view('public.propiedadesFavoritas',compact('propiedadesFavoritas','ingresos'));
	}
}
