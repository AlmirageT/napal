<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTelefono extends Model
{
    protected $table = 'tipo_telefonos';
    protected $primaryKey = 'idTipoTelefono';
    protected $fillable = [
    	'nombreTipoTelefono'
    ];
}
