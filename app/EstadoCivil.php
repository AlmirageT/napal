<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estados_civiles';
    protected $primaryKey = 'idEstadoCivil';
    protected $fillable = [
    	'nombreEstadoCivil'
    ];
}
