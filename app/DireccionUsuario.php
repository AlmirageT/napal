<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionUsuario extends Model
{
    protected $table = 'direcciones_usuarios';
    protected $primaryKey = 'idDireccionUsuario';
    protected $fillable = [
    	'idUsuario',
    	'direccion1',
    	'direccion2',
    	'codigoPostal',
    	'idPais',
    	'idProvincia',
    	'idComuna',
        'idRegion',
    	'latitud',
    	'longitud',
    	'poi'
    ];
}
