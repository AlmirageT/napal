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

    /**
     * Handle the trx ingreso "updated" event.
     *
     * @param  \App\TrxIngreso  $trxIngreso
     * @return void
     */
    public function updated(TrxIngreso $trxIngreso)
    {
        //
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
