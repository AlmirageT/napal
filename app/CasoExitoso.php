<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CasoExitoso extends Model
{
    protected $table = 'casos_exitosos';
    protected $primaryKey = 'idCasoExitoso';
    protected $fillable = [
    	'idPropiedad',
    	'imagenCasoExito'
    ];
}
