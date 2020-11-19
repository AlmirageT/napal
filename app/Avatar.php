<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $table = 'avatares';
    protected $primaryKey = 'idAvatar';
    protected $fillable = [
    	'rutaAvatar'
    ];
}
