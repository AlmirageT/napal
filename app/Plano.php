<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $table = 'planos';
    protected $primaryKey = 'idPlano';
    protected $fillable = [
    	'rutaPlano',
    	'idPropiedad'
    ];
}
