<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropiedadFavorita extends Model
{
    protected $table = 'propiedades_favoritas';
    protected $primaryKey = 'idPropiedadFavorita';
    protected $fillable = [
    	'idPropiedad',
    	'idUsuario'
    ];
}
