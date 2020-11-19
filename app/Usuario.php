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
    	'idAvatar',
    	'password',
    	'profesion',
    	'idIdioma',
    	'token',
    	'tokenCorto',
    	'activarCuenta',
    	'activarNewsletter',
    	'desactivarCuenta',
    	'idTipoPersona',
        'idTipoUsuario'
    ];
}
