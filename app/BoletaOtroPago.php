<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoletaOtroPago extends Model
{
    protected $table = 'boletas_otros_pagos';
    protected $primaryKey = 'idBoletaOtroPago';
    protected $fillable = [
    	'cantidadBoletaOtroPago',
        'fechaVencimiento',
        'idOtrosPagosTransaccion',
    	'idUsuario',
    	'idEstado',
    	'idTrxIngreso'
    ];
}
