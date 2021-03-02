<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioConfirmacionPaypal extends Mailable
{
    use Queueable, SerializesModels;
    protected $usuario;
    protected $boleta;
    protected $inversionODeposito;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $boleta, $inversionODeposito)
    {
        $this->usuario = $usuario;
        $this->boleta = $boleta;
        $this->inversionODeposito = $inversionODeposito;
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
        $inversionODeposito = $this->inversionODeposito;
        
        return $this->from(['pagos@esmidas.com','EsMidas - Inversión Segura'])->subject('Su cargo de dinero ha sido exitoso')->view('mail.envioConfirmacionPaypal',compact('usuario','boleta'));
    }
}
