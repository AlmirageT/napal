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
use App\Proyecto;
use Session;
use DB;

class ProyectoController extends Controller
{
    public function index()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
    	return view('admin.proyectos.index');
    }
    public function create()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
    	$paises = Pais::pluck('nombrePais','idPais');
        $regiones = Region::pluck('nombreRegion','idRegion');
        $provincias = Provincia::pluck('nombreProvincia','idProvincia');
        $comunas = Comuna::pluck('nombreComuna','idComuna');
    	return view('admin.proyectos.create',compact('paises','regiones','provincias','comunas'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'fotoPortada' => 'required|max:102400',
                'nombreProyecto' => 'required',
                'idPais' => 'required',
                'idRegion' => 'required',
                'idProvincia' => 'required',
                'idComuna' => 'required',
                'direccion' => 'required',
                'numeracionProyecto' => 'required',
                'codigoPostal' => 'required',
                'latitud' => 'required',
                'longitud' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB, los datos no puede venir vacios');
                return back();
            }
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
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
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
            $validator = Validator::make($request->all(), [
                'nombreProyecto' => 'required',
                'idPais' => 'required',
                'idRegion' => 'required',
                'idProvincia' => 'required',
                'idComuna' => 'required',
                'direccion' => 'required',
                'numeracionProyecto' => 'required',
                'codigoPostal' => 'required',
                'latitud' => 'required',
                'longitud' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no puede venir vacios');
                return back();
            }
            DB::beginTransaction();
                $imgName = null;
	            if($request->file('fotoPortada')){
	                $imagen = $request->file('fotoPortada');
	                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
	                $imagen->move('assets/images/proyectos/',$imgName);
	            }
	            $proyecto = Proyecto::find($idProyecto);
                if ($imgName != null) {
                    if(file_exists($proyecto->fotoPortada)){
                        unlink($proyecto->fotoPortada);
                    }
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
                    if(file_exists($proyecto->fotoPortada)){
                        unlink($proyecto->fotoPortada);
                    }
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
