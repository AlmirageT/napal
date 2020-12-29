<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    protected $table = 'tipos_cuentas';
    protected $primaryKey = 'idTipoCuenta';
    protected $fillable = [
    	'nombreTipoCuenta'
    ];
}
