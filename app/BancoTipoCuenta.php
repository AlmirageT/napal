<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BancoTipoCuenta extends Model
{
    protected $table = 'bancos_tipos_cuentas';
    protected $primaryKey = 'idBancoTipoCuenta';
    protected $fillable = [
    	'idBanco',
    	'idTipoCuenta'
    ];
}
