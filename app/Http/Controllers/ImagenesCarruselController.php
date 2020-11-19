<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\ImagenCarrusel;
use App\TipoImagen;
use Image;
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
            $validator = Validator::make($request->all(), [
                'rutaImagenCarrusel' => 'max:102400'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return back();
            }
            DB::beginTransaction();
                if (cache::has('imagenesWeb')) {
                    cache::forget('imagenesWeb');
                }
                if (cache::has('imagenesMovil')) {
                    cache::forget('imagenesMovil');
                }
            	$imagenCarrusel = new ImagenCarrusel();
            	if ($request->file('rutaImagenCarrusel')) {
                    if ($request->idTipoImagen == 1) {
                        # code...
                		$imagen = $request->file('rutaImagenCarrusel');
                        $img = Image::make($imagen);
                        $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                        $img->resize(1992, 1040, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        $img->save('assets/images/carrousel/'.$imgName);
                        $imagenCarrusel->rutaImagenCarrusel = 'assets/images/carrousel/'.$imgName;
                    }else{
                        $imagen = $request->file('rutaImagenCarrusel');
                        $img = Image::make($imagen);
                        $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                        $img->resize(1000, 740, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        $img->save('assets/images/carrousel/'.$imgName);
                        $imagenCarrusel->rutaImagenCarrusel = 'assets/images/carrousel/'.$imgName;
                    }
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
            $validator = Validator::make($request->all(), [
                'rutaImagenCarrusel' => 'max:102400'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return back();
            }
            DB::beginTransaction();
                if (cache::has('imagenesWeb')) {
                    cache::forget('imagenesWeb');
                }
                if (cache::has('imagenesMovil')) {
                    cache::forget('imagenesMovil');
                }
	    		$imagenCarrusel = ImagenCarrusel::find($idImagenCarrusel);
	    		if ($request->file('rutaImagenCarrusel')) {
	    			if ($imagenCarrusel->rutaImagenCarrusel != null) {
                		unlink($imagenCarrusel->rutaImagenCarrusel);
	    			}
            		if ($request->idTipoImagen == 1) {
                        # code...
                        $imagen = $request->file('rutaImagenCarrusel');
                        $img = Image::make($imagen);
                        $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                        $img->resize(1992, 1040, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        $img->save('assets/images/carrousel/'.$imgName);
                        $imagenCarrusel->rutaImagenCarrusel = 'assets/images/carrousel/'.$imgName;
                    }else{
                        $imagen = $request->file('rutaImagenCarrusel');
                        $img = Image::make($imagen);
                        $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                        $img->resize(1000, 740, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        $img->save('assets/images/carrousel/'.$imgName);
                        $imagenCarrusel->rutaImagenCarrusel = 'assets/images/carrousel/'.$imgName;
                    }
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
                if (cache::has('imagenesWeb')) {
                    cache::forget('imagenesWeb');
                }
                if (cache::has('imagenesMovil')) {
                    cache::forget('imagenesMovil');
                }
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
