<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCredito extends Model
{
    protected $table = 'tipos_creditos';
    protected $primaryKey = 'idTipoCredito';
    protected $fillable = [
    	'nombreTipoCredito'
    ];
}
