<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table = 'propiedades';
    protected $primaryKey = 'idPropiedad';
    protected $fillable = [
    	'nombrePropiedad',
    	'idPais',
    	'idProvincia',
    	'idComuna',
    	'direccion1',
    	'direccion2',
    	'codigoPostal',
    	'cantidadSubPropiedad',
    	'fotoPrincipal',
    	'fotoMapa',
    	'idTipoInversion',
    	'idUsuario',
    	'idProyecto',
    	'idTipoFlexibilidad',
    	'idTipoCredito',
    	'tieneChat',
    	'idTipoCalidad',
    	'idEstado',
    	'precio',
    	'idMoneda',
    	'plazoMeses',
    	'rentabilidadAnual',
    	'rentabilidadTotal',
    	'descripcion',
    	'mConstruido',
    	'mSuperficie',
    	'mTerraza',
    	'habitaciones',
    	'baños',
    	'latitud',
    	'longitud',
    	'poi',
    	'fechaFinalizacion',
    	'fechaInicio',
    	'notasInternas',
    	'idExpertoAsociado',
        'idRegion'
    ];
}
