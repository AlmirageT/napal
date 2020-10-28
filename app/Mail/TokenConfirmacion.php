<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TokenConfirmacion extends Mailable
{
    use Queueable, SerializesModels;
    protected $url_token;
    protected $nuevoUsuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url_token,$nuevoUsuario)
    {
        $this->url_token = $url_token;
        $this->nuevoUsuario = $nuevoUsuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = $this->url_token;
        $nuevoUsuario = $this->nuevoUsuario;
        return $this->subject('Código de activación')->view('mail.mailConfirmacion',compact('token','nuevoUsuario'));
    }
}
