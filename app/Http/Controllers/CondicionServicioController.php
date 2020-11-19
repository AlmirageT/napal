<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\CondicionServicio;
use Response;
use DB;

class CondicionServicioController extends Controller
{
    public function index()
    {
    	$condicionesServicios = CondicionServicio::all();
    	return view('admin.condicionServicio.index',compact('condicionesServicios'));
    }
    public function ver_condiciones_servicios($idCondicionServicio)
    {
        $condicionServicio = CondicionServicio::find($idCondicionServicio);
        $filename = $condicionServicio->nombrePDFCondicionServicio;
        $path = $condicionServicio->rutaCondicionServicio;

        return Response::make(file_get_contents($path), 200, [
               'Content-Type' => 'application/pdf',
               'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'rutaCondicionServicio' => 'max:102400'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return back();
            }
            DB::beginTransaction();
            	if (cache::has('condicionServicio')) {
		            cache::forget('condicionServicio');
		        }
            	$condicionServicio = new CondicionServicio();
            	$condicionServicio->nombrePDFCondicionServicio = $request->nombrePDFCondicionServicio;
            	if ($request->file('rutaCondicionServicio')) {
            		$imagen = $request->file('rutaCondicionServicio');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/documentos/',$imgName);
                    $condicionServicio->rutaCondicionServicio = 'assets/documentos/'.$imgName;
            	}
            	$condicionServicio->save();
                toastr()->success('Agregado Correctamente', 'El documento ha sido agregada correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idCondicionServicio)
    {
    	try {
    		if (cache::has('condicionServicio')) {
	            cache::forget('condicionServicio');
	        }
            $validator = Validator::make($request->all(), [
                'rutaCondicionServicio' => 'max:102400'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return back();
            }
            DB::beginTransaction();
	    		$condicionServicio = CondicionServicio::find($idCondicionServicio);
            	$condicionServicio->nombrePDFCondicionServicio = $request->nombrePDFCondicionServicio;
	    		if ($request->file('rutaCondicionServicio')) {
	    			if ($condicionServicio->rutaCondicionServicio != null) {
                		unlink($condicionServicio->rutaCondicionServicio);
	    			}
            		$imagen = $request->file('rutaCondicionServicio');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/documentos/',$imgName);
                    $condicionServicio->rutaCondicionServicio = 'assets/documentos/'.$imgName;
            	}
	            $condicionServicio->save();
                toastr()->success('Actualizado Correctamente', 'El documento ha sido agregada correctamente', ['timeOut' => 9000]);
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
    public function destroy($idCondicionServicio)
    {
    	try {
    		if (cache::has('condicionServicio')) {
	            cache::forget('condicionServicio');
	        }
    		DB::beginTransaction();
    			$condicionServicio = CondicionServicio::find($idCondicionServicio);
	            toastr()->success('Eliminado Correctamente', 'El documento ha sido eliminado', ['timeOut' => 9000]);
	            if ($condicionServicio->rutaCondicionServicio != null) {
            		unlink($condicionServicio->rutaCondicionServicio);
    			}
	            $condicionServicio->delete();
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
