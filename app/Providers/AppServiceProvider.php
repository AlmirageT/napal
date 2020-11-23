<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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

        View::share('redesSociales',$redesSociales);
        View::share('misionEmpresa',$misionEmpresa);
    }
}
