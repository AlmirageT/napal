<?php 
	
namespace App\Helpers;

use App\Producto;
use Session;
use Cache;

class CacheHelper {

	public static function limpiarCachePropiedades() {

	    if (Cache::has('propiedades')) { 
            Cache::forget('propiedades');
        }

        $status = (Cache::get('propiedades')) ? false : true;
        return $status;
	}
}