<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Pais;
use App\Comuna;
use App\Provincia;
use App\Region;
use App\Usuario;
use App\Estado;
use App\Moneda;
use App\TipoCredito;
use App\TipoCalidad;
use App\TipoFlexibilidad;
use App\Proyecto;
use App\TipoInversion;
use App\Propiedad;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PropiedadController extends Controller
{
    public function index()
    {
    	$propiedades = Propiedad::select('*')
    	->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
    	->join('paises','propiedades.idPais','=','paises.idPais')
    	->join('regiones','propiedades.idRegion','=','regiones.idRegion')
    	->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
    	->join('comunas','propiedades.idComuna','=','comunas.idComuna')
    	->join('estados','propiedades.idEstado','=','estados.idEstado')
    	->join('monedas','propiedades.idMoneda','=','monedas.idMoneda')
    	->join('tipos_creditos','propiedades.idTipoCredito','=','tipos_creditos.idTipoCredito')
    	->join('tipos_calidades','propiedades.idTipoCalidad','=','tipos_calidades.idTipoCalidad')
    	->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
    	->join('proyectos','propiedades.idProyecto','=','proyectos.idProyecto')
    	->join('tipo_inversiones','propiedades.idTipoInversion','=','tipo_inversiones.idTipoInversion')
        ->orderBy('propiedades.idPropiedad','DESC')
    	->get();
    	return view('admin.propiedades.index',compact('propiedades'));
    }
    public function create()
    {
    	$usuarios = Usuario::pluck('nombre','idUsuario');
    	$paises = Pais::pluck('nombrePais','idPais');
        $regiones = Region::pluck('nombreRegion','idRegion');
        $provincias = Provincia::pluck('nombreProvincia','idProvincia');
        $comunas = Comuna::pluck('nombreComuna','idComuna');
        $estados = Estado::where('idTipoEstado',2)->pluck('nombreEstado','idEstado');
        $monedas = Moneda::pluck('nombreMoneda','idMoneda');
        $tipo_credito = TipoCredito::pluck('nombreTipoCredito','idTipoCredito');
        $tipo_calidad = TipoCalidad::pluck('nombreTipoCalidad','idTipoCalidad');
        $tipo_flexibilidad = TipoFlexibilidad::pluck('nombreTipoFlexibilidad','idTipoFlexibilidad');
        $proyecto = Proyecto::pluck('nombreProyecto','idProyecto');
        $tipo_inversion = TipoInversion::pluck('nombreTipoInversion','idTipoInversion');
    	return view('admin.propiedades.create',compact('paises','regiones','provincias','comunas','usuarios','estados','monedas','tipo_credito','tipo_calidad','tipo_flexibilidad','proyecto','tipo_inversion'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$imgName = null;
	            if($request->file('fotoPrincipal')){
	                $imagen = $request->file('fotoPrincipal');
	                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
	                $imagen->move('assets/images/propiedades/',$imgName);
	            }
            	$propiedad = new Propiedad($request->all());
            	if ($imgName != null) {
            		$propiedad->fotoPrincipal = 'assets/images/propiedades/'.$imgName;
            	}
            	if ($request->tieneChat == "on") {
            		$propiedad->tieneChat = 1;
            	}else{
            		$propiedad->tieneChat = 0;
            	}
            	$geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
	            $propiedad->poi = $geoHash[0]->geoHash;
	            $propiedad->save();
	            toastr()->success('Agregado Correctamente', 'La propiedad: '.$request->nombrePropiedad.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::to('napalm/propiedades');
    	} catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            DB::rollback();
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            DB::rollback();
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back();
        } catch (Exception $e) {
            DB::rollback();         
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
    }
    public function edit($idPropiedad)
    {
    	$propiedad = Propiedad::find($idPropiedad);
    	$usuarios = Usuario::pluck('nombre','idUsuario');
    	$paises = Pais::pluck('nombrePais','idPais');
        $regiones = Region::pluck('nombreRegion','idRegion');
        $provincias = Provincia::pluck('nombreProvincia','idProvincia');
        $comunas = Comuna::pluck('nombreComuna','idComuna');
        $estados = Estado::where('idTipoEstado',2)->pluck('nombreEstado','idEstado');
        $monedas = Moneda::pluck('nombreMoneda','idMoneda');
        $tipo_credito = TipoCredito::pluck('nombreTipoCredito','idTipoCredito');
        $tipo_calidad = TipoCalidad::pluck('nombreTipoCalidad','idTipoCalidad');
        $tipo_flexibilidad = TipoFlexibilidad::pluck('nombreTipoFlexibilidad','idTipoFlexibilidad');
        $proyecto = Proyecto::pluck('nombreProyecto','idProyecto');
        $tipo_inversion = TipoInversion::pluck('nombreTipoInversion','idTipoInversion');
        return view('admin.propiedades.edit',compact('propiedad','usuarios','paises','regiones','provincias','comunas','estados','monedas','tipo_credito','tipo_calidad','tipo_flexibilidad','proyecto','tipo_inversion'));
    }
    public function update(Request $request, $idPropiedad)
    {
    	try {
            DB::beginTransaction();
            	$imgName = null;
	            if($request->file('fotoPrincipal')){
	                $imagen = $request->file('fotoPrincipal');
	                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
	                $imagen->move('assets/images/propiedades/',$imgName);
	            }
            	$propiedad = Propiedad::find($idPropiedad);
            	if ($propiedad->fotoPrincipal != null) {
                    unlink($propiedad->fotoPrincipal);
            	}
            	$propiedad->fill($request->all());
            	if ($imgName != null) {
            		$propiedad->fotoPrincipal = 'assets/images/propiedades/'.$imgName;
            	}
            	if ($request->tieneChat == "on") {
            		$propiedad->tieneChat = 1;
            	}else{
            		$propiedad->tieneChat = 0;
            	}
            	$geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
	            $propiedad->poi = $geoHash[0]->geoHash;
	            $propiedad->save();
	            toastr()->success('Actualizado Correctamente', 'La propiedad: '.$request->nombrePropiedad.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::to('napalm/propiedades');
    	} catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            DB::rollback();
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            DB::rollback();
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back();
        } catch (Exception $e) {
            DB::rollback();         
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
    }
    public function destroy($idPropiedad)
    {
    	try {
    		DB::beginTransaction();
    			$propiedad = Propiedad::find($idPropiedad);
	            toastr()->success('Eliminado Correctamente', 'La propiedad '.$propiedad->nombrePropiedad.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            if ($propiedad->fotoPrincipal != null) {
	                unlink($propiedad->fotoPrincipal);
	            }
	            $propiedad->delete();
    		DB::commit();
            return redirect::to('napalm/propiedades');
    	} catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            DB::rollback();
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            DB::rollback();
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back();
        } catch (Exception $e) {
            DB::rollback();         
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
    }
}
