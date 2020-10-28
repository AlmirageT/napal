<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Pais;
use App\Comuna;
use App\Provincia;
use App\Region;
use App\Proyecto;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProyectoController extends Controller
{
    public function index()
    {
    	$proyectos = Proyecto::select('*')
        ->join('paises','proyectos.idPais','=','paises.idPais')
        ->join('regiones','proyectos.idRegion','=','regiones.idRegion')
        ->join('provincias','proyectos.idProvincia','=','provincias.idProvincia')
        ->join('comunas','proyectos.idComuna','=','comunas.idComuna')
        ->orderBy('proyectos.idProyecto','DESC')
        ->get();
    	return view('admin.proyectos.index',compact('proyectos'));
    }
    public function create()
    {
    	$paises = Pais::pluck('nombrePais','idPais');
        $regiones = Region::pluck('nombreRegion','idRegion');
        $provincias = Provincia::pluck('nombreProvincia','idProvincia');
        $comunas = Comuna::pluck('nombreComuna','idComuna');
    	return view('admin.proyectos.create',compact('paises','regiones','provincias','comunas'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
	            $imgName = null;
	            if($request->file('fotoPortada')){
	                $imagen = $request->file('fotoPortada');
	                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
	                $imagen->move('assets/images/proyectos/',$imgName);
	            }
	            $proyecto = new Proyecto($request->all());
	            $proyecto->fotoPortada = 'assets/images/proyectos/'.$imgName;
	            $geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
	            $proyecto->poi = $geoHash[0]->geoHash;
				$proyecto->save();
	            toastr()->success('Agregado Correctamente', 'El proyecto: '.$request->nombreProyecto.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::to('napalm/proyectos');
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
    public function edit($idProyecto)
    {
    	$proyecto = Proyecto::find($idProyecto);
    	$paises = Pais::pluck('nombrePais','idPais');
        $regiones = Region::pluck('nombreRegion','idRegion');
        $provincias = Provincia::pluck('nombreProvincia','idProvincia');
        $comunas = Comuna::pluck('nombreComuna','idComuna');
        return view('admin.proyectos.edit',compact('proyecto','paises','regiones','provincias','comunas'));
    }
    public function update(Request $request, $idProyecto)
    {
    	try {
            DB::beginTransaction();
                $imgName = null;
	            if($request->file('fotoPortada')){
	                $imagen = $request->file('fotoPortada');
	                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
	                $imagen->move('assets/images/proyectos/',$imgName);
	            }
	            $proyecto = Proyecto::find($idProyecto);
                if ($imgName != null) {
                    unlink($proyecto->fotoPortada);
                }
	            $proyecto->fill($request->all());
	            if ($imgName != null) {
		            $proyecto->fotoPortada = 'assets/images/proyectos/'.$imgName;
	            }
	            $geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
	            $proyecto->poi = $geoHash[0]->geoHash;
				$proyecto->save();


                toastr()->success('Actualizado Correctamente', 'El proyecto: '.$request->nombreProyecto.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::to('napalm/proyectos');
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
    public function destroy($idProyecto)
    {
    	try {
    		DB::beginTransaction();
    			$proyecto = Proyecto::find($idProyecto);
	            toastr()->success('Eliminado Correctamente', 'El proyecto: '.$proyecto->nombreProyecto.' ha sido eliminado correctamente', ['timeOut' => 9000]);
                if ($proyecto->fotoPortada) {
                    unlink($proyecto->fotoPortada);
                }
	            $proyecto->delete();
    		DB::commit();
            return redirect::to('napalm/proyectos');
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
