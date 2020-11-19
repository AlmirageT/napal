<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxEgresos extends Model
{
    protected $table = 'trx_egresos';
    protected $primaryKey = 'idTrxEgreso';
    protected $fillable = [
    	'idUsuario',
    	'monto',
    	'idMoneda',
    	'webClient'
    ];
}
