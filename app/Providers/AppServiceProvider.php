<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\TrxIngresoObserver;
use App\Observers\TrxEgresosObserver;
use App\ParametroGeneral;
use App\MisionEmpresa;
use App\TrxIngreso;
use App\TrxEgresos;
use App\RedSocial;
use Schema;
use Cache;
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
        
        if (cache::has('redesSociales')) {
            $redesSociales = cache::get('redesSociales');
        }else{
            $redesSociales = cache::remember('redesSociales', 1*60, function(){
                $cacheRedesSociales = RedSocial::all();
                return $cacheRedesSociales;
            });
        }
        if(cache::has('diversifica')){
            $valorInicio = cache::get('diversifica');
        }else{
            $valorInicio = cache::remember('diversifica', 99999999999*60, function(){
                $cacheValorInicio = ParametroGeneral::where('nombreParametroGeneral','VALOR INICIO')->first();
                return $cacheValorInicio;
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
        TrxIngreso::observe(TrxIngresoObserver::class);
        TrxEgresos::observe(TrxEgresosObserver::class);

        View::share('redesSociales',$redesSociales);
        View::share('misionEmpresa',$misionEmpresa);
        View::share('valorInicio',$valorInicio);
    }
}
