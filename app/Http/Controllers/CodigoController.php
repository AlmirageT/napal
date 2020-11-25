<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Codigo;
use DB;

class CodigoController extends Controller
{
    public function index()
    {
    	$codigos = Codigo::all();
        return view('admin.codigosPromocionales.index',compact('codigos'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'fechaVencimiento'=>'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No debe dejar campos en blanco');
                return back();
            }
            DB::beginTransaction();
                $codigo = new Codigo($request->all());
                $codigo->codigo = uniqid();
                $codigo->save();
                toastr()->success('Agregado Correctamente', 'El código: '.$codigo->codigo.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idCodigo)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'fechaVencimiento'=>'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No debe dejar campos en blanco');
                return back();
            }
            DB::beginTransaction();
                $codigo = Codigo::find($idCodigo);
                $codigo->fill($request->all());
                $codigo->save();
                toastr()->success('Actualizado Correctamente', 'La fecha de vencimiento ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idCodigo)
    {
    	try {
            DB::beginTransaction();
                $codigo = Codigo::find($idCodigo);
                toastr()->success('Eliminado Correctamente', 'El código: '.$codigo->codigo.' ha sido eliminado correctamente', ['timeOut' => 9000]);
                $codigo->delete();
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
