<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Pais;
use DB;

class PaisController extends Controller
{
    public function index()
    {
    	$paises = Pais::all();
    	return view('admin.ubicaciones.paises.index',compact('paises'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$ruta = null;
            	if($request->file('fotoPais')){
                    $imagen = $request->file('fotoPais');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/images/paises/',$imgName);
                    $ruta = 'assets/images/paises/'.$imgName;
                }
            	$pais = new Pais($request->all());
            	$pais->fotoPais =$ruta;
            	$pais->save();
                toastr()->success('Agregado Correctamente', 'El tipo de calidad: '.$request->nombrePais.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idPais)
    {
    	try {
            DB::beginTransaction();
	    		$pais = Pais::find($idPais);
	    		if ($request->file('fotoPais')) {
                	unlink($pais->fotoPais);
                	$imagen = $request->file('fotoPais');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/images/paises/',$imgName);
                    $ruta = 'assets/images/paises/'.$imgName;
	    		}
	            $pais->nombrePais = $request->nombrePais;
	            if ($request->file('fotoPais')) {
	            	if ($pais->fotoPais) {
		            	$pais->fotoPais = $ruta;
	            	}
	            }
	            $pais->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de calidad: '.$request->nombrePais.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idPais)
    {
    	try {
    		DB::beginTransaction();
    			$pais = Pais::find($idPais);
    			if ($pais->fotoPais) {
                	unlink($pais->fotoPais);
    			}
	            toastr()->success('Eliminado Correctamente', 'El tipo de calidad: '.$pais->nombrePais.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $pais->delete();
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
