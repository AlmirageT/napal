<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFaq extends Model
{
    protected $table = 'tipos_faqs';
    protected $primaryKey = 'idTipoFaq';
    protected $fillable = [
    	'nombreTipoFaq'
    ];
}
