<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipos_documentos';
    protected $primaryKey = 'idTipoDocumento';
    protected $fillable = [
    	'nombreTipoDocumento'
    ];
}
