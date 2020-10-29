<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\ImagenCarrusel;
use App\TipoImagen;
use DB;

class ImagenesCarruselController extends Controller
{
    public function index()
    {
    	$imagenesCarruseles = ImagenCarrusel::select('*')
    	->join('tipos_imagenes','imagenes_carruseles.idTipoImagen','=','tipos_imagenes.idTipoImagen')
    	->orderBy('imagenes_carruseles.idImagenCarrusel','DESC')
    	->get();
    	$tiposImagenes = TipoImagen::pluck('nombreTipoImagen','idTipoImagen');
    	return view('admin.imagenes_carrusel.index',compact('imagenesCarruseles','tiposImagenes'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$imagenCarrusel = new ImagenCarrusel();
            	if ($request->file('rutaImagenCarrusel')) {
            		$imagen = $request->file('rutaImagenCarrusel');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/images/carrousel/',$imgName);
                    $imagenCarrusel->rutaImagenCarrusel = 'assets/images/carrousel/'.$imgName;
            	}
            	if ($request->activoImagenCarrusel == "on") {
            		$imagenCarrusel->activoImagenCarrusel = 1;
            	}else{
            		$imagenCarrusel->activoImagenCarrusel = 0;
            	}
            	$imagenCarrusel->idTipoImagen = $request->idTipoImagen;
            	$imagenCarrusel->save();
                toastr()->success('Agregado Correctamente', 'La imagen ha sido agregada correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idImagenCarrusel)
    {
    	try {
            DB::beginTransaction();
	    		$imagenCarrusel = ImagenCarrusel::find($idImagenCarrusel);
	    		if ($request->file('rutaImagenCarrusel')) {
	    			if ($imagenCarrusel->rutaImagenCarrusel != null) {
                		unlink($imagenCarrusel->rutaImagenCarrusel);
	    			}
            		$imagen = $request->file('rutaImagenCarrusel');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/images/carrousel/',$imgName);
                    $imagenCarrusel->rutaImagenCarrusel = 'assets/images/carrousel/'.$imgName;
            	}
            	if ($request->activoImagenCarrusel == "on") {
            		$imagenCarrusel->activoImagenCarrusel = 1;
            	}else{
            		$imagenCarrusel->activoImagenCarrusel = 0;
            	}
            	$imagenCarrusel->idTipoImagen = $request->idTipoImagen;
	            $imagenCarrusel->save();
                toastr()->success('Actualizado Correctamente', 'La imagen ha sido agregada correctamente', ['timeOut' => 9000]);
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
    public function destroy($idImagenCarrusel)
    {
    	try {
    		DB::beginTransaction();
    			$imagenCarrusel = ImagenCarrusel::find($idImagenCarrusel);
	            toastr()->success('Eliminado Correctamente', 'La imagen ha sido agregada correctamente', ['timeOut' => 9000]);
	            if ($imagenCarrusel->rutaImagenCarrusel != null) {
            		unlink($imagenCarrusel->rutaImagenCarrusel);
    			}
	            $imagenCarrusel->delete();
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
