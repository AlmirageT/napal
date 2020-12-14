<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaldoDisponible extends Model
{
    protected $table = 'saldos_disponibles';
    protected $primaryKey = 'idSaldoDisponible';
    protected $fillable = [
    	'cantidadSaldoDisponible',
    	'idUsuario'
    ];
}
