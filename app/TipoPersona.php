<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    protected $table = 'tipo_personas';
    protected $primaryKey = 'idTipoPersona';
    protected $fillable = [
    	'nombreTipoPersona'
    ];	
}
