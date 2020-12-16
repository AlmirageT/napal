<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BienvenidoEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $url;
    protected $nombre;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url,$nombre)
    {
        $this->url = $url;
        $this->nombre = $nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = $this->url;
        $nombre = $this->nombre;
        return $this->from(['contacto@rifomipropiedad.com','EsMidas - Inversión Segura'])->subject('Cuenta Activada')->view('mail.bienvenidoEmail',compact('url','nombre'));
    }
}
