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
    protected $data_uri;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($obtenerCorreoUsuario,$data_uri)
    {
        $this->obtenerCorreoUsuario = $obtenerCorreoUsuario;
        $this->data_uri = $data_uri;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $obtenerCorreoUsuario = $this->obtenerCorreoUsuario;
        $data_uri = $this->data_uri;
        return $this->from(['contacto@rifomipropiedad.com','EsMidas - Inversión Segura'])->subject('Transferencia Realizada')->view('mail.transferenciaRealizada',compact('obtenerCorreoUsuario','data_uri'));        
    }
}
