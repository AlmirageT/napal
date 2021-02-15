<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MisionEmpresa extends Model
{
    protected $table = 'mision_empresa';
    protected $primaryKey = 'idMisionEmpresa';
    protected $fillable = [
        'nombreMisionEmpresa',
    	'textoMisionEmpresa'
    ];
}
