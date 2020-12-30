<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoTransferencia extends Mailable
{
    use Queueable, SerializesModels;
    protected $obtenerCorreoUsuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($obtenerCorreoUsuario)
    {
        $this->obtenerCorreoUsuario = $obtenerCorreoUsuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $obtenerCorreoUsuario = $this->obtenerCorreoUsuario;
        return $this->from(['contacto@rifomipropiedad.com','EsMidas - Inversión Segura'])->subject('Transferencia Realizada')->view('mail.transferenciaRealizada',compact('obtenerCorreoUsuario'));        
    }
}
