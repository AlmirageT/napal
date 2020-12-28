<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstruccionBancaria extends Model
{
    protected $table = 'instrucciones_bancarias';
    protected $primaryKey = 'idIntruccionBancaria';
    protected $fillable = [
    	'concepto',
    	'importe',
    	'validado',
    	'idCuentaBancariaUsuario',
    	'idUsuario'
    ];
}
