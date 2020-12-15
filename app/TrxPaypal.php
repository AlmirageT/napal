<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxPaypal extends Model
{
    protected $table = 'trx_paypal';
    protected $primaryKey = 'idTrxPaypal';
    protected $fillable = [
    	'transaccionPaypal',
    	'totalPaypal',
    	'descripcionPaypal',
    	'facturaPaypal',
    	'idEstadoPago',
    	'idUsuario'
    ];
}
