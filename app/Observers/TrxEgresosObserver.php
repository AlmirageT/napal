<?php

namespace App\Observers;

use App\TrxEgresos;
use App\SaldoDisponible;
use Session;

class TrxEgresosObserver
{
    /**
     * Handle the trx egresos "created" event.
     *
     * @param  \App\TrxEgresos  $trxEgresos
     * @return void
     */
    public function created(TrxEgresos $trxEgresos)
    {
        if (Session::has('usuarioIDSaldo')) {
            $saldosDisponibles = SaldoDisponible::where('idUsuario',Session::get('usuarioIDSaldo'))->get();
            if (count($saldosDisponibles)>0) {
                foreach ($saldosDisponibles as $saldoDisponible) {
                    $resta = $saldoDisponible->cantidadSaldoDisponible - $trxEgresos->monto;
                    SaldoDisponible::where('idUsuario',Session::get('usuarioIDSaldo'))->update([
                        'cantidadSaldoDisponible'=>$resta
                    ]);
                }
                Session::forget('usuarioIDSaldo');
            }
        }
    }

    /**
     * Handle the trx egresos "updated" event.
     *
     * @param  \App\TrxEgresos  $trxEgresos
     * @return void
     */
    public function updated(TrxEgresos $trxEgresos)
    {
        //
    }

    /**
     * Handle the trx egresos "deleted" event.
     *
     * @param  \App\TrxEgresos  $trxEgresos
     * @return void
     */
    public function deleted(TrxEgresos $trxEgresos)
    {
        //
    }

    /**
     * Handle the trx egresos "restored" event.
     *
     * @param  \App\TrxEgresos  $trxEgresos
     * @return void
     */
    public function restored(TrxEgresos $trxEgresos)
    {
        //
    }

    /**
     * Handle the trx egresos "force deleted" event.
     *
     * @param  \App\TrxEgresos  $trxEgresos
     * @return void
     */
    public function forceDeleted(TrxEgresos $trxEgresos)
    {
        //
    }
}
