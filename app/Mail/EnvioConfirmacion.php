<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioConfirmacion extends Mailable
{
    use Queueable, SerializesModels;
    protected $usuario;
    protected $boleta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $boleta)
    {
        $this->usuario = $usuario;
        $this->boleta = $boleta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $usuario = $this->usuario;
        $boleta = $this->boleta;
        return $this->from(['contacto@rifomipropiedad.com','EsMidas - Inversión Segura'])->subject('Su cargo de dinero ha sido exitoso')->view('mail.envioConfirmacionOtrosPagos',compact('usuario','boleta'));
    }
}
