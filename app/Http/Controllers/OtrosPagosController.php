<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\EnvioCorreoExito;
use App\Jobs\EnvioCorreoReverso;
use App\BoletaOtroPago;
use App\TrxIngreso;
use App\Usuario;
use App\SaldoDisponible;
use Log;

class OtrosPagosController extends Controller
{
    public function condeu01req(Request $request){
        Log::info($request);

        $digitoVerificador = substr($request->p_idcli, -1);
        $rutSinDigito = substr($request->p_idcli, 0, -1);
        $rutUsuario = $rutSinDigito."-".$digitoVerificador;

        $boleta = BoletaOtroPago::select('*')
            ->join('usuarios','boletas_otros_pagos.idUsuario','=','usuarios.idUsuario')
            ->where('boletas_otros_pagos.idEstado',11)
            ->where('usuarios.rut',$rutUsuario)
            ->first();
        if($boleta){
            Log::info($boleta);

            $convenio = getenv('OTROS_PAGOS_COVENIO');
            //Log::info($convenio);
            $key = $request->p_fectr.$request->p_tid.$convenio;
            $llave = str_pad($key,16);
            $encriptacion = openssl_encrypt($llave, "AES-256-CBC",getenv('OTROS_PAGOS_KEY'),1,getenv('OTROS_PAGOS_IV'));
            //Log::info($encriptacion);
            $h_firma = base64_encode($encriptacion);
            //Log::info($h_firma);
            $headers = apache_request_headers();
            foreach($headers as $header => $value){
                if($header == "H-Firma"){
                    if($value != $h_firma){
                        return response()->json(['r_retcod' => "65"],200);
                    }
                }
            }
            $idTransaccion = (int)$request->p_tid;
            if($idTransaccion){
            //Log::info($idTransaccion);

                return response()->json([
                    'r_tid' => $idTransaccion,
                    'r_retcod' => "00",
                    'r_ndoc' => "0001",
                    'r_docs' => [
                        array(
                            'r_doc' => "".$boleta->idBoletaOtroPago."",
                            'r_mnt' => str_pad(strval($boleta->cantidadBoletaOtroPago),10,"0",STR_PAD_LEFT)."00",
                            'r_mnv' => str_pad(strval($boleta->cantidadBoletaOtroPago),10,"0",STR_PAD_LEFT)."00",
                            'r_fev' => strftime("%Y%m%d",strtotime($boleta->fechaVencimiento)),
                            'r_fem' => date('Ymd'),
                            'r_det' => $h_firma 
                        )
                    ]
                ], 200);
            }else{
                return response()->json(['r_retcod'=>"03"],200);
            }
        }else{
            return response()->json(['r_retcod'=>"03"],200);
        }

    }
    public function notpag01req(Request $request){
        $idTransaccion = (int)$request->p_tid;
        if($idTransaccion){
            $convenio = getenv('OTROS_PAGOS_COVENIO');
            $key = $request->p_fectr.$request->p_tid.$convenio;
            $llave = str_pad($key,16);
            $encriptacion = openssl_encrypt($llave, "AES-256-CBC",getenv('OTROS_PAGOS_KEY'),1,getenv('OTROS_PAGOS_IV'));
            $h_firma = base64_encode($encriptacion);
            $headers = apache_request_headers();
            foreach($headers as $header => $value){
                if($header == "H-Firma"){
                    if($value != $h_firma){
                        return response()->json(['r_retcod' => "65"],200);
                    }
                }
            }
            $digitoVerificador = substr($request->p_idcli, -1);
            $rutSinDigito = substr($request->p_idcli, 0, -1);
            $rutUsuario = $rutSinDigito."-".$digitoVerificador;

            $boleta = BoletaOtroPago::select('*')
                ->join('usuarios','boletas_otros_pagos.idUsuario','=','usuarios.idUsuario')
                ->where('boletas_otros_pagos.idEstado',11)
                ->where('usuarios.rut',$rutUsuario)
                ->first();
            
            if($boleta){
                $ingresoSaldo = TrxIngreso::create([
                    'monto' => $boleta->cantidadBoletaOtroPago,
                    'webClient' => 'otrospagos.com',
                    'idUsuario' => $boleta->idUsuario,
                    'idMoneda' => 1,
                    'idEstado' => 1,
                    'idTipoMedioPago' => 3,
                    'numeroTransaccion' => $idTransaccion
                ]);
                $boleta->idEstado = 1;
                $boleta->idOtrosPagosTransaccion = $idTransaccion;
                $boleta->idTrxIngreso = $ingresoSaldo->idTrxIngreso;
                $boleta->save();


                EnvioCorreoExito::dispatch();
                //sigue otros pagos
                return response()->json([
                    'r_tid' => $idTransaccion,
                    'r_retcod' => "00",
                    'r_cau' => $request->p_doc
                ],200);
            }else{
                return response()->json([
                    'r_tid' => $idTransaccion,
                    'r_retcod' => "10",
                    'r_cau' => $request->p_doc
                ],200);
            }
        }
    }
    public function revpag01req(Request $request){
        
        $idTransaccion = (int)$request->p_tid;

        $boleta = BoletaOtroPago::where('idOtrosPagosTransaccion', $idTransaccion)->first();

        if($boleta){
            $boleta->idEstado = 2;
            $boleta->save();

            $trxIngresos = TrxIngreso::find($boleta->idTrxIngreso);
            $valorTrx = $trxIngresos->monto;
            $trxIngresos->idEstado = 2;
            $trxIngresos->save();

            $saldoDisponible = SaldoDisponible::where('idUsuario',$trxIngresos->idUsuario)->first();
            $totalSaldo = $saldoDisponible->cantidadSaldoDisponible;

            $nuevoSaldo =  $totalSaldo - $valorTrx;

            $saldoDisponible->cantidadSaldoDisponible = $nuevoSaldo;
            $saldoDisponible->save();
            
            EnvioCorreoReverso::dispatch();
            
            return response()->json([
                'r_tid' => $idTransaccion,
                'r_retcod' => "00"
            ],200);
        }
        return response()->json([
            'r_tid' => $idTransaccion,
            'r_retcod' => "13"
        ],200);
    }
}
