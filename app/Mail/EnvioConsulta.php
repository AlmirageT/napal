<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioConsulta extends Mailable
{
    use Queueable, SerializesModels;
    protected $nombre;
    protected $email; 
    protected $asunto;
    protected $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $email, $asunto, $mensaje)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nombre = $this->nombre;
        $email = $this->email;
        $asunto = $this->asunto;
        $mensaje = $this->mensaje;

        return $this->from($email)->subject($asunto)->view('mail.consultaEmail',compact('nombre','mensaje','email'));
    }
}
