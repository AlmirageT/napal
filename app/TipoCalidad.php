<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCalidad extends Model
{
    protected $table = 'tipos_calidades';
    protected $primaryKey = 'idTipoCalidad';
    protected $fillable = [
    	'nombreTipoCalidad',
    	'nombreClase'
    ];
}
