<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogRegistro extends Model
{
    protected $table = 'log_registros';
    protected $primaryKey = 'idLogRegistro';
    protected $fillable = [
    	'idUsuario'
    ];
}
