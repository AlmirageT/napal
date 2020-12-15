<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CambioDolar extends Model
{
    protected $table = 'cambios_dolares';
    protected $primaryKey = 'idCambioDolar';
    protected $fillable = [
    	'valorCambioDolar',
    ];
}
