<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\EnvioConfirmacionPaypal;
use Mail;

class EnvioCorreoExitoPaypal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $usuario;
    protected $boleta;
    protected $inversionODeposito;
    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $usuario = $this->usuario;
        $boleta = $this->boleta;
        $inversionODeposito = $this->inversionODeposito;

        Mail::to($usuario->correo)->bcc(['pauloberrios@gmail.com','ivan.saez@informatica.isbast.com'])->send(new EnvioConfirmacionPaypal($usuario, $boleta, $inversionODeposito));

    }
}
