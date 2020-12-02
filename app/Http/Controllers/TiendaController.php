<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Propiedad;
use App\TrxIngreso;
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
        ->orderBy('propiedades.idEstado','ASC')
        ->paginate(9);
        $estados = Estado::where('idTipoEstado',2)->pluck('nombreEstado','idEstado');
        $ingresos = TrxIngreso::all();

    	return view('tienda',compact('propiedadesTienda','estados','ingresos'));
    }
    public function financiado()
    {
        $propiedadesTienda = Propiedad::select('*')
        ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
        ->join('paises','propiedades.idPais','=','paises.idPais')
        ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
        ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
        ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
        ->join('estados','propiedades.idEstado','=','estados.idEstado')
        ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
        ->orderByRaw("FIELD(propiedades.idEstado, 5) DESC")
        ->paginate(9);
        $estados = Estado::where('idTipoEstado',2)->pluck('nombreEstado','idEstado');
        $ingresos = TrxIngreso::all();
        $idEstado = 5;

        return view('tienda',compact('propiedadesTienda','estados','ingresos','idEstado'));
    }
    public function cerrado()
    {
        $propiedadesTienda = Propiedad::select('*')
        ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
        ->join('paises','propiedades.idPais','=','paises.idPais')
        ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
        ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
        ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
        ->join('estados','propiedades.idEstado','=','estados.idEstado')
        ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
        ->orderByRaw("FIELD(propiedades.idEstado, 6) DESC")
        ->paginate(9);
        $estados = Estado::where('idTipoEstado',2)->pluck('nombreEstado','idEstado');
        $ingresos = TrxIngreso::all();
        $idEstado = 6;
        return view('tienda',compact('propiedadesTienda','estados','ingresos','idEstado'));
    }
    public function no_financiado()
    {
        $propiedadesTienda = Propiedad::select('*')
        ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
        ->join('paises','propiedades.idPais','=','paises.idPais')
        ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
        ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
        ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
        ->join('estados','propiedades.idEstado','=','estados.idEstado')
        ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
        ->orderByRaw("FIELD(propiedades.idEstado, 7) DESC")
        ->paginate(9);
        $estados = Estado::where('idTipoEstado',2)->pluck('nombreEstado','idEstado');
        $ingresos = TrxIngreso::all();
        $idEstado = 7;

        return view('tienda',compact('propiedadesTienda','estados','ingresos','idEstado'));
    }

    /*public function ordenarPropiedades($idEstado)
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
        $ingresos = TrxIngreso::all();
    	return view('paginas',compact('propiedadesTienda','ingresos'));
    }*/
}
