<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrxIngreso;
use App\Propiedad;
use App\Usuario;

class PublicController extends Controller
{
    public function estadisitca()
    {
        $usuarios = Usuario::where('idTipoUsuario',2)->get();
        $ingresosFinanciados = TrxIngreso::select('*')
    		->join('propiedades','trx_ingresos.idPropiedad','=','propiedades.idPropiedad')
            ->where('propiedades.idEstado',5)
            ->get();
        $totalPropiedades = Propiedad::where('idEstado',5)->get();
        $promedioTir = 0;
        $valorTotal = 0;
        foreach ($totalPropiedades as $totalPropiedad) {
            $promedioTir = $promedioTir + $totalPropiedad->rentabilidadAnual;
        }
        $promedioFinal = $promedioTir/count($totalPropiedades);
        foreach ($ingresosFinanciados as $ingresoFinanciado) {
            $valorTotal = $valorTotal + $ingresoFinanciado->monto;
        }
    	return view('estadisticas',compact('usuarios','promedioFinal','valorTotal'));
    }
}
