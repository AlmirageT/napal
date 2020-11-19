<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    protected $table = 'codigos';
    protected $primaryKey = 'idCodigo';
    protected $fillable = [
    	'codigo',
    	'fechaVencimiento'
    ];
}
