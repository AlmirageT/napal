<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $primaryKey = 'idChat';
    protected $fillable = [
    	'idPropiedad'
    ];
}
