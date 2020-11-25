<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Documento;
use App\TipoDocumento;
use App\Propiedad;
use DB;
use Response;

class DocumentoController extends Controller
{
    public function ver_pdf($idDocumento)
    {
        $documentos = Documento::find($idDocumento);
        $filename = $documentos->nombreDocumento;
        $path = $documentos->rutaDocumento;

        return Response::make(file_get_contents($path), 200, [
               'Content-Type' => 'application/pdf',
               'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }
    public function create($idPropiedad)
    {
        $documentos = Documento::select('*')
        ->join('tipos_documentos','documentos.idTipoDocumento','=','tipos_documentos.idTipoDocumento')
        ->join('propiedades','documentos.idPropiedad','=','propiedades.idPropiedad')
        ->where('documentos.idPropiedad',$idPropiedad)
        ->get();
		$tipos_documentos = TipoDocumento::pluck('nombreTipoDocumento','idTipoDocumento');
    	return view('admin.documentos.create',compact('tipos_documentos','idPropiedad','documentos'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'documentoArchivo' => 'required|max:102400',
                'idPropiedad' => 'required',
                'nombreDocumento' => 'required',
                'idTipoDocumento' => 'required',
                'notas' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return redirect::to('napalm/subir-documentos/create/'.$request->idPropiedad);
            }
    		DB::beginTransaction();
    			$ruta = null;
                //guardar imagen
                if($request->file('documentoArchivo')){
                    $imagen = $request->file('documentoArchivo');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/documentos/',$imgName);
                    $ruta = 'assets/documentos/'.$imgName;
                }
    			$documento = new Documento($request->all());
                $documento->rutaDocumento = $ruta;
    			$documento->idPropiedad = $request->idPropiedad;
    			$documento->save();
    		DB::commit();
            toastr()->success('El documento: '.$request->nombreDocumento.' ha sido agregado correctamente', 'Agregado Correctamente',  ['timeOut' => 9000]);
            return redirect::to('napalm/subir-documentos/create/'.$request->idPropiedad);
    	}catch (ModelNotFoundException $e) {
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
    public function destroy($idDocumento)
    {
    	try {
    		DB::beginTransaction();
    			$documento = Documento::find($idDocumento);
	            toastr()->success('Eliminado Correctamente', 'El documento: '.$documento->nombreDocumento.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            if ($documento->rutaDocumento != null) {
	                unlink($documento->rutaDocumento);
	            }
	            $documento->delete();
    		DB::commit();
            return redirect::to('napalm/subir-documentos/create/'.$documento->idPropiedad);
    	}catch (ModelNotFoundException $e) {
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
