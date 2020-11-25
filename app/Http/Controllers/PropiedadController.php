<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
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
use Image;
use Cache;

class PropiedadController extends Controller
{
    public function index()
    {
    	return view('admin.propiedades.index');
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
        $tipoCredito = TipoCredito::pluck('nombreTipoCredito','idTipoCredito');
        $tipoCalidad = TipoCalidad::pluck('nombreTipoCalidad','idTipoCalidad');
        $tipoFlexibilidad = TipoFlexibilidad::pluck('nombreTipoFlexibilidad','idTipoFlexibilidad');
        $proyecto = Proyecto::pluck('nombreProyecto','idProyecto');
        $tipoInversion = TipoInversion::pluck('nombreTipoInversion','idTipoInversion');
    	return view('admin.propiedades.create',compact('paises','regiones','provincias','comunas','usuarios','estados','monedas','tipoCredito','tipoCalidad','tipoFlexibilidad','proyecto','tipoInversion'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'fotoPrincipal' => 'max:102400',
                'nombrePropiedad' => 'required',
                'idPais' => 'required',
                'idRegion' => 'required',
                'idProvincia' => 'required',
                'idComuna' => 'required',
                'direccion1' => 'required',
                'direccion2' => 'required',
                'codigoPostal' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
                'idTipoInversion' => 'required',
                'idProyecto' => 'required',
                'idTipoFlexibilidad' => 'required',
                'tieneChat' => 'required',
                'idTipoCalidad' => 'required',
                'idTipoCredito' => 'required',
                'precio' => 'required',
                'idMoneda' => 'required',
                'plazoMeses' => 'required',
                'fechaInicio' => 'required',
                'fechaFinalizacion' => 'required',
                'rentabilidadAnual' => 'required',
                'rentabilidadTotal' => 'required',
                'idEstado' => 'required',
                'idUsuario' => 'required',
                'destacadoPropiedad' => 'required',
                'descripcion' => 'required',
                'mConstruido' => 'required',
                'mSuperficie' => 'required',
                'mTerraza' => 'required',
                'cantidadSubPropiedad' => 'required',
                'habitaciones' => 'required',
                'baños' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB, no debe dejar los datos vacios');
                return back();
            }
            DB::beginTransaction();
                if (cache::has('propiedades')) {
                    cache::forget('propiedades');
                }
                if (cache::has('propiedadesTienda')) {
                    cache::forget('propiedadesTienda');
                }
            	$imgName = null;
	            if($request->file('fotoPrincipal')){
	                $imagen = $request->file('fotoPrincipal');
                    $img = Image::make($imagen);
                    
	                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $img->resize(350, 233, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('assets/images/propiedades/'.$imgName);
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
                if ($request->destacadoPropiedad == "on") {
                    $propiedad->destacadoPropiedad = 1;
                }else{
                    $propiedad->destacadoPropiedad = 0;
                }
            	$geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
                $linkMapa = "https://maps.googleapis.com/maps/api/staticmap?center=".$request->latitud.",".$request->longitud."&zoom=17&size=350x233&markers=color:blue%7Clabel:S%7C".$request->latitud.",".$request->longitud."&key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g";
                $mapa = Image::make($linkMapa);
                $mapa->resize(350, 233, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $mapaNombre = uniqid();
                $mapa->save('assets/images/propiedades/'.$mapaNombre);
                $propiedad->fotoMapa = 'assets/images/propiedades/'.$mapaNombre;
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
        $tipoCredito = TipoCredito::pluck('nombreTipoCredito','idTipoCredito');
        $tipoCalidad = TipoCalidad::pluck('nombreTipoCalidad','idTipoCalidad');
        $tipoFlexibilidad = TipoFlexibilidad::pluck('nombreTipoFlexibilidad','idTipoFlexibilidad');
        $proyecto = Proyecto::pluck('nombreProyecto','idProyecto');
        $tipoInversion = TipoInversion::pluck('nombreTipoInversion','idTipoInversion');
        return view('admin.propiedades.edit',compact('propiedad','usuarios','paises','regiones','provincias','comunas','estados','monedas','tipoCredito','tipoCalidad','tipoFlexibilidad','proyecto','tipoInversion'));
    }
    public function update(Request $request, $idPropiedad)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'fotoPrincipal' => 'max:102400',
                'nombrePropiedad' => 'required',
                'idPais' => 'required',
                'idRegion' => 'required',
                'idProvincia' => 'required',
                'idComuna' => 'required',
                'direccion1' => 'required',
                'direccion2' => 'required',
                'codigoPostal' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
                'idTipoInversion' => 'required',
                'idProyecto' => 'required',
                'idTipoFlexibilidad' => 'required',
                'tieneChat' => 'required',
                'idTipoCalidad' => 'required',
                'idTipoCredito' => 'required',
                'precio' => 'required',
                'idMoneda' => 'required',
                'plazoMeses' => 'required',
                'fechaInicio' => 'required',
                'fechaFinalizacion' => 'required',
                'rentabilidadAnual' => 'required',
                'rentabilidadTotal' => 'required',
                'idEstado' => 'required',
                'idUsuario' => 'required',
                'destacadoPropiedad' => 'required',
                'descripcion' => 'required',
                'mConstruido' => 'required',
                'mSuperficie' => 'required',
                'mTerraza' => 'required',
                'cantidadSubPropiedad' => 'required',
                'habitaciones' => 'required',
                'baños' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB, no debe dejar los datos vacios');
                return back();
            }
            DB::beginTransaction();
                if (cache::has('propiedades')) {
                    cache::forget('propiedades');
                }
                if (cache::has('propiedadesTienda')) {
                    cache::forget('propiedadesTienda');
                }
            	$imgName = null;
            	$propiedad = Propiedad::find($idPropiedad);
	            if($request->file('fotoPrincipal')){
                    if ($propiedad->fotoPrincipal != null) {
                        unlink($propiedad->fotoPrincipal);
                    }
	                $imagen = $request->file('fotoPrincipal');
	                $img = Image::make($imagen);
                    
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $img->resize(350, 233, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('assets/images/propiedades/'.$imgName);
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
                if ($request->destacadoPropiedad == "on") {
                    $propiedad->destacadoPropiedad = 1;
                }else{
                    $propiedad->destacadoPropiedad = 0;
                }
            	$geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
                if ($propiedad->fotoMapa != null) {
                    unlink($propiedad->fotoMapa);
                }
                $linkMapa = "https://maps.googleapis.com/maps/api/staticmap?center=".$request->latitud.",".$request->longitud."&zoom=17&size=350x233&markers=color:blue%7Clabel:S%7C".$request->latitud.",".$request->longitud."&key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g";
                $mapa = Image::make($linkMapa);
                $mapa->resize(350, 233, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $mapaNombre = uniqid();
                $mapa->save('assets/images/propiedades/'.$mapaNombre);
                $propiedad->fotoMapa = 'assets/images/propiedades/'.$mapaNombre;
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
                if (cache::has('propiedades')) {
                    cache::forget('propiedades');
                }
                if (cache::has('propiedadesTienda')) {
                    cache::forget('propiedadesTienda');
                }
    			$propiedad = Propiedad::find($idPropiedad);
	            toastr()->success('Eliminado Correctamente', 'La propiedad '.$propiedad->nombrePropiedad.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            if ($propiedad->fotoPrincipal != null) {
	                unlink($propiedad->fotoPrincipal);
	            }
                if ($propiedad->fotoMapa != null) {
                    unlink($propiedad->fotoMapa);
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
