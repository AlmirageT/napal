<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipografia extends Model
{
    protected $table = 'tipografias';
    protected $primaryKey = 'idTipografia';
    protected $fillable = [
        'nombreGeneral',
        'linkTipografia',
        'nombreTipografia'
    ];
}
