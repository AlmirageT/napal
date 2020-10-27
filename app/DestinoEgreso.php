<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinoEgreso extends Model
{
    protected $table = 'destinos_egresos';
    protected $primaryKey = 'idDestinoEgreso';
    protected $fillable = [
    	'idTrxEgreso',
    	'idTipoMedioPago',
    	'idEstado',
    	'nombreBanco',
    	'nombreDestinatario',
    	'codigoSwift',
    	'numeroCuenta',
    	'notas'
    ];
}
