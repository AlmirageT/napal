<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    protected $fillable = [
    	'nombre',
    	'apellido',
    	'rut',
    	'correo',
    	'password',
    	'profesion',
    	'token',
    	'tokenCorto',
    	'activarCuenta',
    	'activarNewsletter',
    	'desactivarCuenta',
        'fechaNacimiento',
    	'idIdioma',
    	'idAvatar',
    	'idTipoPersona',
        'idTipoUsuario',
        'idSexo',
        'idEstadoCivil'
    ];
}
