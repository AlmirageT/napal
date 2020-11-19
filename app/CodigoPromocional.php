<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoPromocional extends Model
{
    protected $table = 'codigos_promocionales';
    protected $primaryKey = 'idCodigoPromocional';
    protected $fillable = [
    	'idCodigo',
    	'idUsuario'
    ];
}
