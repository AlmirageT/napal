<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'idProyecto';
    protected $fillable = [
    	'nombreProyecto',
    	'idComuna',
    	'idPais',
    	'idProvincia',
    	'direccion',
    	'codigoPostal',
    	'latitud',
    	'longitud',
    	'poi',
    	'fotoPortada',
        'numeracionProyecto',
        'idRegion'
    ];
}
