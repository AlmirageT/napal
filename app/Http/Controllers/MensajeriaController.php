<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CorreoAvisoUsuario;
use App\Mail\CorreoAviso;
use App\TrxIngreso;
use App\Usuario;
use App\Propiedad;
use App\ParametroGeneral;
use Mail;

class MensajeriaController extends Controller
{
    public function correoUsuariosQueNoHanInvertido()
    {
		$ingresos = TrxIngreso::select('*')
		->join('propiedades','trx_ingresos.idPropiedad','=','propiedades.idPropiedad')
		->join('estados','propiedades.idEstado','=','estados.idEstado')
		->where('propiedades.idEstado',4)
		->pluck('trx_ingresos.idUsuario');
		$usuarios = Usuario::whereNotIn('idUsuario',$ingresos)->where('activarCuenta',1)->get();
		$diasParaEnviarMail = ParametroGeneral::where('nombreParametroGeneral','DIAS ANTES DE FINALIZAR COMPROMISO')->firstOrFail();
		$propiedades = Propiedad::where('idEstado',4)->get();
		foreach ($propiedades as $propiedad) {
			$date1 = new \DateTime(date('Y-m-d',strtotime($propiedad->fechaInicio)));
			$date2 = new \DateTime(date('Y-m-d',strtotime($propiedad->fechaFinalizacion)));
			$diff = $date1->diff($date2);
			if ($diff->days <= $diasParaEnviarMail->valorParametroGeneral) {
				foreach ($usuarios as $usuario) {
                	Mail::to($usuario->correo)->send(new CorreoAviso($propiedad));
				}
			}
		}
    }
    public function corrreoUsuariosQueHanInvertido()
    {
    	$ingresos = TrxIngreso::select('*')
		->join('propiedades','trx_ingresos.idPropiedad','=','propiedades.idPropiedad')
		->join('estados','propiedades.idEstado','=','estados.idEstado')
		->where('propiedades.idEstado',4)
		->pluck('trx_ingresos.idUsuario');
		$usuarios = Usuario::whereIn('idUsuario',$ingresos)->where('activarCuenta',1)->get();
		$diasParaEnviarMail = ParametroGeneral::where('nombreParametroGeneral','DIAS ANTES DE FINALIZAR COMPROMISO')->firstOrFail();
		$propiedades = Propiedad::where('idEstado',4)->get();
		foreach ($propiedades as $propiedad) {
			$date1 = new \DateTime(date('Y-m-d',strtotime($propiedad->fechaInicio)));
			$date2 = new \DateTime(date('Y-m-d',strtotime($propiedad->fechaFinalizacion)));
			$diff = $date1->diff($date2);
			if ($diff->days <= $diasParaEnviarMail->valorParametroGeneral) {
				foreach ($usuarios as $usuario) {
                	Mail::to($usuario->correo)->send(new CorreoAvisoUsuario($propiedad));
				}
			}
		}
    }
}
