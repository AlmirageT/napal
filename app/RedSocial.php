<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    protected $table = 'redes_sociales';
    protected $primaryKey = 'idRedSocial';
    protected $fillable = [
    	'nombreRedSocial',
    	'rutaRedSocial'
    ];
}
