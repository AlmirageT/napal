<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropiedadFavorita;
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
}
