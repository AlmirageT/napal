<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inversion extends Model
{
    protected $table = 'inversiones';
    protected $primaryKey = 'idInversion';
    protected $fillable = [
    	'idPropiedad',
    	'idUsuario',
    	'monto',
    	'idMoneda',
    	'notas',
    	'idEstado'
    ];
}
