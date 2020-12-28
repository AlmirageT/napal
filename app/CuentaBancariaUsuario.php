<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaBancariaUsuario extends Model
{
    protected $table = 'cuentas_bancarias_usuarios';
    protected $primaryKey = 'idCuentaBancariaUsuario';
    protected $fillable = [
    	'codigoSwift',
    	'numeroCuenta',
    	'comprobanteBancario',
    	'idBanco',
    	'idUsuario',
    	'idTipoCuenta'
    ];
}
