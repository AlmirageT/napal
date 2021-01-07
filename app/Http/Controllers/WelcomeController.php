<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\PropiedadFavorita;
use App\ParametroGeneral;
use App\ImagenCarrusel;
use App\MisionEmpresa;
use App\CasoExitoso;
use App\TrxIngreso;
use App\Propiedad;
use App\RedSocial;
use App\Usuario;
use Cache;

class WelcomeController extends Controller
{
    public function index()
    {
    	if (cache::has('imagenesWeb')) {
            $imagenesWeb = cache::get('imagenesWeb');
        }else{
           $imagenesWeb = cache::remember('imagenesWeb', 1*60, function(){
                $cacheImagenesWeb = ImagenCarrusel::where('activoImagenCarrusel',1)->where('idTipoImagen',1)->get();
                return $cacheImagenesWeb;
            }); 
        }

        if (cache::has('imagenesMovil')) {
            $imagenesMovil = cache::get('imagenesMovil');
        }else{
            $imagenesMovil = cache::remember('imagenesMovil', 1*60, function(){
                $cacheImagenesMovil = ImagenCarrusel::where('activoImagenCarrusel',1)->where('idTipoImagen',2)->get();
                return $cacheImagenesMovil;
            });
        }
        if (cache::has('propiedades')) {
            $propiedades = cache::get('propiedades');
        }else{
            $propiedades = cache::remember('propiedades', 1*60, function(){
                $cantidadPropiedades = ParametroGeneral::where('nombreParametroGeneral','PROPIEDADES A MOSTRAR')->first();
                $cachePropiedades = Propiedad::select('*')
                ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
                ->join('paises','propiedades.idPais','=','paises.idPais')
                ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
                ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
                ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
                ->join('estados','propiedades.idEstado','=','estados.idEstado')
                ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
                ->join('tipos_calidades','propiedades.idTipoCalidad','=','tipos_calidades.idTipoCalidad')
                ->orderBy('propiedades.idPropiedad','DESC')
                ->where('propiedades.idEstado',4)
                ->where('propiedades.destacadoPropiedad',1)
                ->take($cantidadPropiedades->valorParametroGeneral)
                ->get();
                return $cachePropiedades;
            });
        }
        if (cache::has('casosExitosos')) {
            $casosExitosos = cache::get('casosExitosos');
        }else{
            $casosExitosos = cache::remember('casosExitosos', 1*60, function(){
                $cacheCasosExitosos = CasoExitoso::select('*')
                ->join('propiedades','casos_exitosos.idPropiedad','=','propiedades.idPropiedad')
                ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
                ->take(6)
                ->get();
                return $cacheCasosExitosos;
            });
        }


        if (cache::has('misionEmpresa')) {
            $misionEmpresa = cache::get('misionEmpresa');
        }else{
            $misionEmpresa = cache::remember('misionEmpresa',1*60, function(){
                $cacheMisionEmpresa = MisionEmpresa::first();
                return $cacheMisionEmpresa;
            });
        }

        $ingresos = TrxIngreso::all();
        $ingresosFinanciados = TrxIngreso::select('*')
            ->join('propiedades','trx_ingresos.idPropiedad','=','propiedades.idPropiedad')
            ->where('propiedades.idEstado',5)
            ->get();
        $valorInicio = ParametroGeneral::where('nombreParametroGeneral','VALOR INICIO')->first();
        $propiedadesFavoritas = PropiedadFavorita::all();
        $totalPropiedades = Propiedad::where('idEstado',5)->get();
        $usuarios = Usuario::where('idTipoUsuario',2)->get();
        $promedioTir = 0;
        $valorTotal = 0;
        foreach ($totalPropiedades as $totalPropiedad) {
            $promedioTir = $promedioTir + $totalPropiedad->rentabilidadAnual;
        }
        $promedioFinal = $promedioTir/count($totalPropiedades);
        foreach ($ingresosFinanciados as $ingresoFinanciado) {
            $valorTotal = $valorTotal + $ingresoFinanciado->monto;
        }
        return view('welcome',compact('imagenesWeb','propiedades','imagenesMovil','casosExitosos','ingresos','valorInicio','propiedadesFavoritas','promedioFinal','valorTotal','usuarios'));
    }
    public function obtenerPropiedad(Request $request, $idPropiedad)
    {
        if ($request->ajax()) {
            $propiedad = Propiedad::find($idPropiedad);
            $nombrePropiedad = str_replace(" ", "-", $propiedad->nombrePropiedad);
            $idEncriptado = Crypt::encrypt($idPropiedad);
            $rutaImagen = asset($propiedad->fotoPrincipal);
            $rutaPagina = asset('invierte/chile/propiedad/detalle')."?nombrePropiedad=".$nombrePropiedad."&idPropiedad=".$idEncriptado;
            $nombreContent = "Invierte en nuestra propiedad ".$propiedad->nombrePropiedad;
            return response()->json(['propiedad'=>$propiedad, 'nombrePropiedad'=>$nombrePropiedad,'idEncriptado'=>$idEncriptado,'rutaImagen'=>$rutaImagen,'rutaPagina'=>$rutaPagina,'nombreContent'=>$nombreContent]);
        }
    }
}
