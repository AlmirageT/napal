<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxIngreso extends Model
{
    protected $table = 'trx_ingresos';
    protected $primaryKey = 'idTrxIngreso';
    protected $fillable = [
    	'monto',
    	'webClient',
    	'idUsuario',
    	'idMoneda',
    	'idEstado',
    	'idTipoMedioPago',
        'idPropiedad'
    ];
}
