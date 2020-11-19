<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ImagenCarrusel;
use App\Propiedad;
use App\CasoExitoso;
use App\RedSocial;
use App\MisionEmpresa;
use Schema;
use View;
use Cache;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
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
                $cachePropiedades = Propiedad::select('*')
                ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
                ->join('paises','propiedades.idPais','=','paises.idPais')
                ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
                ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
                ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
                ->join('estados','propiedades.idEstado','=','estados.idEstado')
                ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
                ->orderBy('propiedades.idPropiedad','DESC')
                ->where('propiedades.idEstado',4)
                ->where('propiedades.destacadoPropiedad',1)
                ->take(6)
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

        if (cache::has('redesSociales')) {
            $redesSociales = cache::get('redesSociales');
        }else{
            $redesSociales = cache::remember('redesSociales', 1*60, function(){
                $cacheRedesSociales = RedSocial::all();
                return $cacheRedesSociales;
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

        View::share('imagenesWeb',$imagenesWeb);
        View::share('propiedades',$propiedades);
        View::share('imagenesMovil',$imagenesMovil);
        View::share('casosExitosos',$casosExitosos);
        View::share('redesSociales',$redesSociales);
        View::share('misionEmpresa',$misionEmpresa);
    }
}
