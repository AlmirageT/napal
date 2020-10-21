<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaChat extends Model
{
    protected $table = 'respuestas_chats';
    protected $primaryKey = 'idRespuestaChat';
    protected $fillable = [
    	'idChatUsuario',
    	'respuestaPost'
    ];
}
