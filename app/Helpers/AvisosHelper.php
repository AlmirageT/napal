<?php 
			
namespace App\Helpers;

use App\Usuario;
use Session;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;

class AvisosHelper {

	public static function listadoAvisos($id) {
	// muestra el listado de avisos en el header de la aplicación

		$idUsuario = Crypt::decrypt($id);
		$listadoNotificaciones = Aviso::select('avisos.idAviso', 'titulos_avisos.nombreTituloAviso', 'titulos_avisos.cuerpoMensaje', 'avisos.created_at as fecha')
										->join('titulos_avisos', 'titulos_avisos.idTituloAviso', '=', 'avisos.idTituloAviso')
										->where('idUsuario', '=', $idUsuario)
										->orderBy('idAviso', 'DESC')
										->limit(5)
										->get(); // indicar top 5
		return $listadoNotificaciones;
	}

	public static function obtenerFooterAleatorio() {

	// devuelve un dato para rellenar el footer de modo aleatorio
	// 1: dato es TESTIMONIO
	// 2: dato es NOTICIA

		$randomSeleccionDato = rand(1,2);
		if ($randomSeleccionDato == 1) {
			
			// si random da TESTIMONIO
			$consultaCantidadRegistros = DB::select("SELECT count(*) as cuenta FROM testimonios WHERE codigoEmpresa = 1;");
			$totalRegistros = $consultaCantidadRegistros[0]->cuenta;
			$totalRegistros = (int) $totalRegistros;
			$rndRegistro = rand(0, $totalRegistros - 1); // random
			$obtenerRegistro = DB::select("SELECT * FROM testimonios WHERE codigoEmpresa = 1 LIMIT $rndRegistro, 1;");
			$obtenerRegistro[0]->idTipoFooter = 1;

			$footerAleatorio = collect($obtenerRegistro[0]);
			$footerAleatorio = $footerAleatorio->toJson();
			$footerAleatorio = json_decode($footerAleatorio);

			return $footerAleatorio;

		} else { 
			
			// si random da NOTICIAS
			$consultaCantidadRegistros = DB::select("SELECT count(*) as cuenta FROM noticias WHERE codigoEmpresa = 1;");
			$totalRegistros = $consultaCantidadRegistros[0]->cuenta;
			$totalRegistros = (int) $totalRegistros;
			$rndRegistro = rand(0, $totalRegistros - 1); // random
			$obtenerRegistro = DB::select("SELECT * FROM noticias WHERE codigoEmpresa = 1 LIMIT $rndRegistro, 1;");
			$obtenerRegistro[0]->idTipoFooter = 2;

			$footerAleatorio = collect($obtenerRegistro[0]);
			$footerAleatorio = $footerAleatorio->toJson();
			$footerAleatorio = json_decode($footerAleatorio);

			return $footerAleatorio;
		}
	}

	public static function guardarNavegacion($request) {

		try {
			// registrando navegacion de un usuario si está logeado
	        if (Session::get('idTipoUsuario') == 2) {
	            $guardarNavegacion = new LogNavegacionUsuario();
	            $guardarNavegacion->idTipoUsuario = Session::get('idTipoUsuario');
	            $guardarNavegacion->idUsuario = Session::get('idUsuario');
	            $guardarNavegacion->url = $request->fullUrl();
	            $guardarNavegacion->nombre = Session::get('nombre');
	            $guardarNavegacion->apellido = Session::get('apellido');
	            $guardarNavegacion->rut = Session::get('rut');
	            $guardarNavegacion->correo = Session::get('correo');
	            $guardarNavegacion->webclient = $request->userAgent();
	            $guardarNavegacion->save();
	        }

	        return true;
		} catch (Exception $e) {
			return false;
		}
	}
}