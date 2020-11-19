<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CondicionServicio extends Model
{
    protected $table = 'condiciones_servicios';
    protected $primaryKey = 'idCondicionServicio';
    protected $fillable = [
    	'nombrePDFCondicionServicio',
    	'rutaCondicionServicio'
    ];
}
