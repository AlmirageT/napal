<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInversion extends Model
{
    protected $table = 'tipo_inversiones';
    protected $primaryKey = 'idTipoInversion';
    protected $fillable = [
    	'nombreTipoInversion'
    ];
}
