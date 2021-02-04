<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;
use App\ImagenPropiedad;
use App\Propiedad;
use App\FotoPlano;
use App\Documento;
use App\TrxIngreso;
use App\MisionEmpresa;
use Cache;
use Session;
use DB;

class DetalleController extends Controller
{
    public function index(Request $request, $idPropiedad = null)
    {
        
    	try {
            if(Session::has('redirect_url')){
                Session::forget('redirect_url');
            }
            if(cache::has('riesgoAdvertencia')){
                $riesgoAdvertencia = cache::get('riesgoAdvertencia');
            }else{
                $riesgoAdvertencia = cache::remember('riesgoAdvertencia', 99999999999*60, function(){
                    $cacheRiesgoAdvertencia = MisionEmpresa::where('nombreMisionEmpresa','RIESGOS Y ADVERTENCIAS')->get();
                    return $cacheRiesgoAdvertencia;
                });
            }
            if(cache::has('infoFinanciera')){
                $infoFinanciera = cache::get('infoFinanciera');
            }else{
                $infoFinanciera = cache::remember('infoFinanciera', 99999999999*60, function(){
                    $cacheInfoFinanciera = MisionEmpresa::where('nombreMisionEmpresa','INFORMACION FINANCIERA')->get();
                    return $cacheInfoFinanciera;
                });
            }
            $diasPorInversiones = DB::select('SELECT CONCAT(ELT(WEEKDAY(trx_ingresos.created_at), 
                "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo","Lunes")) AS DIA_SEMANA
                FROM  trx_ingresos
                WHERE MONTH(trx_ingresos.created_at) BETWEEN 01 AND 12 AND YEAR(trx_ingresos.created_at) = (:ano) AND trx_ingresos.idPropiedad = (:propiedad)',["ano" => date("Y"),"propiedad"=>Crypt::decrypt($request->idPropiedad)]);
            
            $lunes = 0;
            $martes = 0;
            $miercoles = 0;
            $jueves = 0;
            $viernes = 0;
            $sabado = 0;
            $domingo = 0;

            foreach ($diasPorInversiones as $diaPorInversion) {
                switch ($diaPorInversion->DIA_SEMANA) {
                    case "Lunes":
                        $lunes = $lunes + 1;
                        break;
                    case "Martes":
                        $martes = $martes + 1;
                        break;
                    case "Miercoles":
                        $miercoles = $miercoles + 1;
                        break;
                    case "Jueves":
                        $jueves = $jueves + 1;
                        break;
                    case "Viernes":
                        $viernes = $viernes + 1;
                        break;
                    case "Sabado":
                        $sabado = $sabado + 1;
                        break;
                    case "Domingo":
                        $domingo = $domingo + 1;
                        break;
                }
            }
            

            if ($idPropiedad != null) {
        		$propiedad = Propiedad::select('*')
                    ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
                    ->join('paises','propiedades.idPais','=','paises.idPais')
                    ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
                    ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
                    ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
                    ->join('estados','propiedades.idEstado','=','estados.idEstado')
                    ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
                    ->where('propiedades.idPropiedad',Crypt::decrypt($idPropiedad))
                    ->firstOrFail();
                $imagenesPropiedadesGrandes = ImagenPropiedad::where('idPropiedad',Crypt::decrypt($idPropiedad))->get();
                $imagenesPropiedadesPequeñas = ImagenPropiedad::where('idPropiedad',Crypt::decrypt($idPropiedad))->get();
                $imagenesPlanos = FotoPlano::where('idPropiedad',Crypt::decrypt($idPropiedad))->first();
                $documentos = Documento::where('idPropiedad',Crypt::decrypt($idPropiedad))->get();
                $ingresos = TrxIngreso::where('idPropiedad',Crypt::decrypt($idPropiedad))->get();
        		return view('detalle',compact('propiedad','imagenesPropiedadesGrandes','imagenesPropiedadesPequeñas','imagenesPlanos','documentos','ingresos','riesgoAdvertencia','infoFinanciera'));
            }else{
                $propiedad = Propiedad::select('*')
                    ->join('usuarios','propiedades.idUsuario','=','usuarios.idUsuario')
                    ->join('paises','propiedades.idPais','=','paises.idPais')
                    ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
                    ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
                    ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
                    ->join('estados','propiedades.idEstado','=','estados.idEstado')
                    ->join('tipos_flexibilidades','propiedades.idTipoFlexibilidad','=','tipos_flexibilidades.idTipoFlexibilidad')
                    ->where('propiedades.idPropiedad',Crypt::decrypt($request->idPropiedad))
                    ->firstOrFail();
                $imagenesPropiedadesGrandes = ImagenPropiedad::where('idPropiedad',Crypt::decrypt($request->idPropiedad))->get();
                $imagenesPropiedadesPequeñas = ImagenPropiedad::where('idPropiedad',Crypt::decrypt($request->idPropiedad))->get();
                $imagenesPlanos = FotoPlano::where('idPropiedad',Crypt::decrypt($request->idPropiedad))->get();
                $documentos = Documento::where('idPropiedad',Crypt::decrypt($request->idPropiedad))->get();
                $ingresos = TrxIngreso::where('idPropiedad',Crypt::decrypt($request->idPropiedad))->get();
                $nombrePropiedad = str_replace(" ", "-", $propiedad->nombrePropiedad);

                $url = asset('invierte/chile/propiedad/detalle')."?idPropiedad=".$request->idPropiedad;

                return view('detalle',compact('propiedad','imagenesPropiedadesGrandes','imagenesPropiedadesPequeñas','imagenesPlanos','documentos','ingresos','nombrePropiedad','url','riesgoAdvertencia','infoFinanciera','lunes','martes','miercoles','jueves','viernes','sabado','domingo'));
            }
    	} catch (ModelNotFoundException $e) {
            toastr()->error('Propiedad que busca no existe');
            return redirect::to('/');
        } catch (QueryException $e) {
            toastr()->info('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            return redirect::to('/');
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            return redirect::to('/');
        } catch (Exception $e) {
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::to('/');
        }
    	
    }
}
