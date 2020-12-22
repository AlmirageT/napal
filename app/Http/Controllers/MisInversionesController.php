<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;
use App\ImagenPropiedad;
use App\TrxIngreso;
use App\Propiedad;
use Session;

class MisInversionesController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $propiedadesInvertidas = TrxIngreso::where('idUsuario',Session::get('idUsuario'))->get();
        $arrayIdPropiedad = array();
        foreach ($propiedadesInvertidas as $propiedadInvertida) {
        	$idPropiedades = array(
        		'idPropiedad'=>$propiedadInvertida->idPropiedad
        	);
        	array_push($arrayIdPropiedad,$idPropiedades);
        }
		$arrayIdPropiedadSinDuplicar = array();

		array_push($arrayIdPropiedadSinDuplicar, array_unique($arrayIdPropiedad, SORT_REGULAR));

		$propiedades = Propiedad::select('*')
		->join('estados','propiedades.idEstado','=','estados.idEstado')
		->whereIn('idPropiedad',$arrayIdPropiedadSinDuplicar[0])
		->get();

		return view('public.misInversiones',compact('propiedades'));

    }
    public function detalle(Request $request)
    {
    	try {
	    	$propiedad = Propiedad::select('*')
                    ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
                    ->join('paises','propiedades.idPais','=','paises.idPais')
                    ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
                    ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
                    ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
                    ->join('estados','propiedades.idEstado','=','estados.idEstado')
                    ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
                    ->where('propiedades.idPropiedad',Crypt::decrypt($request->idPropiedad))
                    ->firstOrFail();
            $imagenesPropiedades = ImagenPropiedad::where('idPropiedad',Crypt::decrypt($request->idPropiedad))->get();
    		return view('public.miInversionDetalle',compact('propiedad','imagenesPropiedades'));
    	} catch (ModelNotFoundException $e) {
            toastr()->error('Propiedad que busca no existe');
            return back();
        } catch (Exception $e) {
    		toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return back();
    	}
    }
}
