<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmarEnvio extends Mailable
{
    use Queueable, SerializesModels;
    protected $asunto;
    protected $nombre;
    protected $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($asunto, $nombre, $mensaje)
    {
        $this->asunto = $asunto;
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $asunto = $this->asunto;
        $nombre = $this->nombre;
        $mensaje = $this->mensaje;
        return $this->from(['contacto@esmidas.com','EsMidas - Inversión Segura'])->subject('Consulta recibida')->view('mail.recibidoEmail',compact('nombre','mensaje','asunto'));        
    }
}
