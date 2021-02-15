<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoAvisoUsuario extends Mailable
{
    use Queueable, SerializesModels;
    protected $propiedad;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($propiedad)
    {
        $this->propiedad = $propiedad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $propiedad = $this->propiedad;
        return $this->from(['contacto@rifomipropiedad.com','EsMidas - Inversión Segura'])->subject('Quedan pocos dias para que la propiedad finalice')->view('mail.consultaEmailUsuario',compact('propiedad'));
    }
}
