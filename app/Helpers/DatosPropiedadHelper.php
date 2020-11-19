<?php 

// DATOS BUSCADORES Y DATA PROCESADA de propiedades segun data enviada por SII
// las busquedass simples y directas sobre las tablas via algun ID, deben ser realizadas directamente al modelo en el controlador en cuestión
			
namespace App\Helpers;

use App\Propiedad;
use App\Comuna;
use App\Provincia;
use App\Ciudad;
use App\InformacionRolNoAgricola;
use App\ValorUFM2;
use Session;
use DB;

class DatosPropiedadHelper {

	public static function obtenerDatosUFM2($POI) {

	}

	public static function obtenerPropiedadesSII($direccionBuscada, $codigoComuna) {

		if ($direccionBuscada && $codigoComuna) {
			
			$propiedadesEncontradas = InformacionRolNoAgricola::whereRaw('MATCH(direccion) AGAINST ("' . $direccionBuscada . '")')
															->where('codigoComuna', '=', $codigoComuna)
															->paginate(10);
			return $propiedadesEncontradas;
		}

	}

	public static function obtenerUFM2($idPropiedad) {
		$propiedad = Propiedad::where('idPropiedad', '=', $idPropiedad)->first();
		
		if ($propiedad->idTipoPropiedad == 9) {
			// estudio no considerar habitaciones
			$valorUFM2 = ValorUFM2::where('idComuna', '=', $propiedad->idComuna)
								->where('idTipoPropiedad', '=', $propiedad->idTipoPropiedad)
								->first();

		} else {
			if ($propiedad->habitacion <= 4) {
				$valorUFM2 = ValorUFM2::where('idComuna', '=', $propiedad->idComuna)
									->where('idTipoPropiedad', '=', $propiedad->idTipoPropiedad)
									->where('habitacion', '=', $propiedad->habitacion)
									->first();
			} else {
				$valorUFM2 = ValorUFM2::where('idComuna', '=', $propiedad->idComuna)
									->where('idTipoPropiedad', '=', $propiedad->idTipoPropiedad)
									->where('habitacion', '=', 4) 
									->first();
			}
		}


		if (!$valorUFM2) {
			$valorUFM2Defecto = new \stdClass();
			$valorUFM2Defecto->valorUFM2 = 30;
			$valorUFM2Defecto->valorEstacionamiento = 200;
			$valorUFM2Defecto->valorBodega = 40;

			return $valorUFM2Defecto;
		}

		return $valorUFM2;
	}
}