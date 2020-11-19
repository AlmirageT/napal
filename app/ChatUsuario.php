<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatUsuario extends Model
{
    protected $table = 'chats_usuarios';
    protected $primaryKey = 'idChatUsuario';
    protected $fillable = [
    	'idUsuario',
    	'post',
    	'idChat'
    ];
}
