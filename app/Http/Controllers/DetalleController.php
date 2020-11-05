<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Propiedad;

class DetalleController extends Controller
{
    public function index($idPropiedad)
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
                ->where('propiedades.idPropiedad',$idPropiedad)
                ->firstOrFail();
    		return view('detalle',compact('propiedad'));
    	} catch (ModelNotFoundException $e) {
            toastr()->error('Propiedad que busca no existe');
            return redirect::to('/');
        } catch (QueryException $e) {
            toastr()->info('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            return redirect::to('/');
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            return redirect::to('/');
        } catch (Exception $e) {
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::to('/');
        }
    	
    }
}
