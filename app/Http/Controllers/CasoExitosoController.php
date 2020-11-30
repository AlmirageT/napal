<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\CasoExitoso;
use App\Propiedad;
use Session;
use Image;
use Cache;
use DB;

class CasoExitosoController extends Controller
{
    public function index()
    {  	
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            toastr()->info('Debe estar ingresado para poder entrar a esta pagina');
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3) {
                toastr()->info('No tiene permiso para entrar a esta pagina');
                return abort(401);
            }
        }
		$propiedades = Propiedad::where('idEstado',6)->orWhere('idEstado',5)->pluck('nombrePropiedad','idPropiedad');
    	return view('admin.casosExitosos.index',compact('propiedades'));
    }
    public function store(Request $request)
    {
    	try {
            if (cache::has('casosExitosos')) {
                cache::forget('casosExitosos');
            }
            $validator = Validator::make($request->all(), [
                'idPropiedad'=>'required',
                'imagenCasoExito' => 'required|max:102400'
            ]);
            if ($validator->fails()) {
                toastr()->info('No debe dejar campos en blanco, la imagen no debe pasar los 100 MB');
                return back();
            }
            DB::beginTransaction();
            	$casoExitoso = new CasoExitoso($request->all());
                if($request->file('imagenCasoExito')){
                    $imagen = $request->file('imagenCasoExito');
                    $img = Image::make($imagen);
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $img->resize(224, 268, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('assets/images/casosExitosos/'.$imgName);
                    $casoExitoso->imagenCasoExito = 'assets/images/casosExitosos/'.$imgName;
                }
            	$casoExitoso->save();
                toastr()->success('Agregado Correctamente', 'Caso exitoso agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::back();
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
    public function edit($idCasoExitoso)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            toastr()->info('Debe estar ingresado para poder entrar a esta pagina');
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3) {
                toastr()->info('No tiene permiso para entrar a esta pagina');
                return abort(401);
            }
        }
        $casoExitoso = CasoExitoso::find($idCasoExitoso);
        $propiedades = Propiedad::where('idEstado',6)->orWhere('idEstado',5)->pluck('nombrePropiedad','idPropiedad'); 
        return view('admin.casosExitosos.edit',compact('casoExitoso','propiedades'));
    }
    public function update(Request $request, $idCasoExitoso)
    {
    	try {
            if (cache::has('casosExitosos')) {
                cache::forget('casosExitosos');
            }
            $validator = Validator::make($request->all(), [
                'idPropiedad'=>'required',
                'imagenCasoExito' => 'required|max:102400'
            ]);
            if ($validator->fails()) {
                toastr()->info('No debe dejar campos en blanco, la imagen no debe pasar los 100 MB');
                return back();
            }
            DB::beginTransaction();
	    		$casoExitoso = CasoExitoso::find($idCasoExitoso);
                if($request->file('imagenCasoExito')){
                    if ($casoExitoso->imagenCasoExito != null) {
                        unlink($casoExitoso->imagenCasoExito);
                    }
                    $imagen = $request->file('imagenCasoExito');
                    $img = Image::make($imagen);
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $img->resize(224, 268, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('assets/images/casosExitosos/'.$imgName);
                }
	            $casoExitoso->fill($request->all());
                if($request->file('imagenCasoExito')){
                    $casoExitoso->imagenCasoExito = 'assets/images/casosExitosos/'.$imgName;
                }
	            $casoExitoso->save();
                toastr()->success('Actualizado Correctamente', 'Caso exitoso actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::to('napalm/casos-exitosos');
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
    public function destroy($idCasoExitoso)
    {
    	try {
            if (cache::has('casosExitosos')) {
                cache::forget('casosExitosos');
            }
    		DB::beginTransaction();
    			$casoExitoso = CasoExitoso::find($idCasoExitoso);
                if ($casoExitoso->imagenCasoExito != null) {
                    unlink($casoExitoso->imagenCasoExito);
                }
	            toastr()->success('Eliminado Correctamente', 'El caso exitoso a sido eliminado correctamente', ['timeOut' => 9000]);
	            $casoExitoso->delete();
    		DB::commit();
            return redirect::back();
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
