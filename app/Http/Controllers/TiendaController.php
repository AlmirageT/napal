<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Propiedad;
use App\Estado;
use Cache;

class TiendaController extends Controller
{
    public function index()
    {
        $propiedadesTienda = Propiedad::select('*')
        ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
        ->join('paises','propiedades.idPais','=','paises.idPais')
        ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
        ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
        ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
        ->join('estados','propiedades.idEstado','=','estados.idEstado')
        ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
        ->paginate(9);
        $estados = Estado::where('idTipoEstado',2)->pluck('nombreEstado','idEstado');

    	return view('tienda',compact('propiedadesTienda','estados'));
    }
    public function ordenarPropiedades($idEstado)
    {
    	$propiedadesTienda = Propiedad::select('*')
        ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
        ->join('paises','propiedades.idPais','=','paises.idPais')
        ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
        ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
        ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
        ->join('estados','propiedades.idEstado','=','estados.idEstado')
        ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
        ->orderByRaw("FIELD(propiedades.idEstado, $idEstado) DESC")
        ->paginate(9);
    	return view('paginas',compact('propiedadesTienda'));
    }
}
