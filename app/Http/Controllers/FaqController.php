<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Faq;
use App\TipoFaq;
use DB;

class FaqController extends Controller
{
    //paginas administrador
    public function index()
    {
    	$faqs = Faq::select('*')
    			->join('tipos_faqs','faqs.idTipoFaq','=','tipos_faqs.idTipoFaq')
    			->get();
    	$tiposFaqs = TipoFaq::pluck('nombreTipoFaq','idTipoFaq');
    	return view('admin.faqs.index',compact('faqs','tiposFaqs'));
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
            	$tipoFaq = new Faq($request->all());
            	$tipoFaq->save();
                toastr()->success('Agregado Correctamente', 'El tipo de faq se ha agregado correctamente', ['timeOut' => 5000]);
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
    public function update(Request $request, $idTipoFaq)
    {
    	try {
            DB::beginTransaction();
	    		$tipoFaq = Faq::find($idTipoFaq);
	            $tipoFaq->fill($request->all());
	            $tipoFaq->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de faq ha sido actualizado correctamente', ['timeOut' => 5000]);
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
    public function destroy($idTipoFaq)
    {
    	try {
    		DB::beginTransaction();
    			$tipoFaq = Faq::find($idTipoFaq);
	            toastr()->success('Eliminado Correctamente', 'El tipo de faq ha sido eliminado correctamente', ['timeOut' => 5000]);
	            $tipoFaq->delete();
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
    //paginas publicas
    public function preguntasFrecuentes()
    {
        $faqs = Faq::all();
        $tiposFaqs = Faq::select('*')
                ->join('tipos_faqs','faqs.idTipoFaq','=','tipos_faqs.idTipoFaq')
                ->get();
        return view('public.faq', compact('faqs','tiposFaqs'));
    }
}
