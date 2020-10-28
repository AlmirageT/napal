<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TrxEgresos;
use DB;

class TrxEgresoController extends Controller
{
    public function index()
    {
    	$egresos = TrxEgresos::select('*')
    	->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
    	->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
    	->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
    	->orderBy('trx_egresos.idTrxEgreso','DESC')
    	->paginate(10);
    	return view('admin.transacciones.egresos.index',compact('egresos'));
    }
    public function detalle($idTrxEgreso)
    {
        $egreso = TrxEgresos::select('*')
        ->join('usuarios','trx_egresos.idUsuario','=','usuarios.idUsuario')
        ->join('monedas','trx_egresos.idMoneda','=','monedas.idMoneda')
        ->join('telefonos','usuarios.idUsuario','=','telefonos.idUsuario')
        ->where('trx_egresos.idTrxEgreso',$idTrxEgreso)
        ->first();
        return view('admin.transacciones.egresos.factura',compact('egreso'));
    }
}
