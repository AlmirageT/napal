<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'idBlog';
    protected $fillable = [
    	'nombreBlog',
    	'textoBlog'
    ];
}
