<?php 
			
namespace App\Helpers;

use App\Usuario;
use App\TasaCreditoHipotecario;
use DB;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EvaluarPertenencia {

	public static function EvaluarPertenenciaUsuario($idUsuario) {
	// Evalua si el usuario tiene permiso para modificar el idUsuario ingresado

	    $pertenencia_usuario = new Usuario();
	    $pertenece = $pertenencia_usuario
	       ->where('idUsuario', '=', $idUsuario)
	       ->where('rut', '=', Session::get('rut'))
	       ->first();
	    if ($pertenece == "") {
	        return false;
	    } else {
	        return true;
	    }
	}
}