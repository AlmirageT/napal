<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ImagenCarrusel;
use App\Propiedad;
use Schema;
use View;

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
        $imagenesWeb = ImagenCarrusel::where('activoImagenCarrusel',1)->where('idTipoImagen',1)->get();
        $propiedades = Propiedad::select('*')
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
        ->paginate(10);
        View::share('imagenesWeb',$imagenesWeb);
        View::share('propiedades',$propiedades);
    }
}
