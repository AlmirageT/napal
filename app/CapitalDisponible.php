<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapitalDisponible extends Model
{
    protected $table = 'capitales_disponibles';
    protected $primaryKey = 'idCapitalDisponible';
    protected $fillable = [
    	'capitalDisponible',
    	'idMoneda',
    	'idEstado'
    ];
}
