<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoPlano extends Model
{
    protected $table = 'fotos_planos';
    protected $primaryKey = 'idFotoPlano';
    protected $fillable = [
    	'fotoPlano',
    	'idPropiedad'
    ];
}
