<?php

namespace App\Observers;

use App\TrxIngreso;

use Session;
use App\SaldoDisponible;

class TrxIngresoObserver
{
    /**
     * Handle the trx ingreso "created" event.
     *
     * @param  \App\TrxIngreso  $trxIngreso
     * @return void
     */
    public function created(TrxIngreso $trxIngreso)
    {
        if($trxIngreso->idPropiedad == null){
            if (Session::has('idUsuarioDeposito')) {
                $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuarioDeposito'))->get();
                if (count($saldoDisponible)>0) {
                    foreach ($saldoDisponible as $saldo) {
                        $total = $saldo->cantidadSaldoDisponible + $trxIngreso->monto;
                        SaldoDisponible::where('idUsuario',Session::get('idUsuarioDeposito'))->update([
                            'cantidadSaldoDisponible'=>$total
                        ]);
                    }
                }else{
                    SaldoDisponible::create([
                        'cantidadSaldoDisponible' => $trxIngreso->monto,
                        'idUsuario' => Session::get('idUsuarioDeposito')
                    ]);
                }
                Session::forget('idUsuarioDeposito');
            }else{
                $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->get();
                if (count($saldoDisponible)>0) {
                    foreach ($saldoDisponible as $saldo) {
                        $total = $saldo->cantidadSaldoDisponible + $trxIngreso->monto;
                        SaldoDisponible::where('idUsuario',Session::get('idUsuario'))->update([
                            'cantidadSaldoDisponible'=>$total
                        ]);
                    }
                }else{
                    SaldoDisponible::create([
                        'cantidadSaldoDisponible' => $trxIngreso->monto,
                        'idUsuario' => Session::get('idUsuario')
                    ]);
                }
            }
        }
    }

    /**
     * Handle the trx ingreso "updated" event.
     *
     * @param  \App\TrxIngreso  $trxIngreso
     * @return void
     */
    public function updated(TrxIngreso $trxIngreso)
    {
        if($trxIngreso->idPropiedad == null){
            if(Session::has('montoOriginal') && Session::has('nuevoValor')){
                $saldoDisponible = SaldoDisponible::where('idUsuario',Session::get('idUsuarioDeposito'))->get();
                if (count($saldoDisponible)>0) {
                    foreach ($saldoDisponible as $saldo) {
                        $resta = $saldo->cantidadSaldoDisponible - intval(Session::get('montoOriginal'));
                        SaldoDisponible::where('idUsuario',Session::get('idUsuarioDeposito'))->update([
                            'cantidadSaldoDisponible'=>$resta
                        ]);
                        $nuevoValor = SaldoDisponible::where('idUsuario',Session::get('idUsuarioDeposito'))->first();
                        $total = $nuevoValor->cantidadSaldoDisponible + intval(Session::get('nuevoValor'));
                        SaldoDisponible::where('idUsuario',Session::get('idUsuarioDeposito'))->update([
                            'cantidadSaldoDisponible'=>$total
                        ]);
                    }
                    Session::forget('montoOriginal');
                    Session::forget('nuevoValor');
                    Session::forget('idUsuarioDeposito');
                }
            }
        }
    }

    /**
     * Handle the trx ingreso "deleted" event.
     *
     * @param  \App\TrxIngreso  $trxIngreso
     * @return void
     */
    public function deleted(TrxIngreso $trxIngreso)
    {
        //
    }

    /**
     * Handle the trx ingreso "restored" event.
     *
     * @param  \App\TrxIngreso  $trxIngreso
     * @return void
     */
    public function restored(TrxIngreso $trxIngreso)
    {
        //
    }

    /**
     * Handle the trx ingreso "force deleted" event.
     *
     * @param  \App\TrxIngreso  $trxIngreso
     * @return void
     */
    public function forceDeleted(TrxIngreso $trxIngreso)
    {
        //
    }
}
