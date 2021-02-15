<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxDepositoTransferencia extends Model
{
    protected $table = 'trx_depos_transf';
    protected $primaryKey = 'idTrxDepoTransf';
    protected $fillable = [
    	'nombreBancoOrigen',
    	'numeroOperacion',
    	'bancoOrigen',
    	'fechaDeposito',
    	'numeroCuentaBanco',
    	'validado',
    	'rutaImagen',
        'montoDeposito',
        'idTrxIngreso',
    	'idUsuario'
    ];
}
