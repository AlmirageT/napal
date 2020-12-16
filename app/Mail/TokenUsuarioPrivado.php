<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TokenUsuarioPrivado extends Mailable
{
    use Queueable, SerializesModels;
    protected $url_token;
    protected $usuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url_token, $usuario)
    {
        $this->url_token = $url_token;
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$token = $this->url_token;    	
    	$nuevoUsuario = $this->usuario;
        return $this->from(['contacto@rifomipropiedad.com','EsMidas - Inversión Segura'])->subject('Código de activación')->view('mail.mailConfirmacion',compact('token','nuevoUsuario'));
    }
}
