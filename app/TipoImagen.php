<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoImagen extends Model
{
    protected $table = 'tipos_imagenes';
    protected $primaryKey = 'idTipoImagen';
    protected $fillable = [
    	'nombreTipoImagen'
    ];
}
