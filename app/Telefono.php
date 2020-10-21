<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefonos';
    protected $primaryKey = 'idTelefono';
    protected $fillable = [
    	'idUsuario',
    	'numero',
    	'idTipoTelefono'
    ];
}
