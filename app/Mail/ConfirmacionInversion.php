<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionInversion extends Mailable
{
    use Queueable, SerializesModels;
    protected $propiedad;
    protected $sinCaracteres;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($propiedad,$sinCaracteres)
    {
        $this->propiedad = $propiedad;
        $this->sinCaracteres = $sinCaracteres;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $propiedad = $this->propiedad;
        $sinCaracteres = $this->sinCaracteres;
        return $this->from(['inversion@esmidas.com','EsMidas - Inversión Segura'])->subject('Inversión Realizada')->view('mail.confirmarInversion',compact('propiedad','sinCaracteres'));
    }
}
