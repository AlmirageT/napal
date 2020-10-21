<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFlexibilidad extends Model
{
    protected $table = 'tipos_flexibilidades';
    protected $primaryKey = 'idTipoFlexibilidad';
    protected $fillable = [
    	'nombreTipoFlexibilidad'
    ];
}
