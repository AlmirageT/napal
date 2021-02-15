<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\EnvioConfirmacion;
use Mail;

class EnvioCorreoExito implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $usuario;
    protected $boleta;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($usuario, $boleta)
    {
        $this->usuario = $usuario;
        $this->boleta = $boleta;
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
        Mail::to('ivan.saez@informatica.isbast.com')->bcc(['pauloberrios@gmail.com','ivan.saez@informatica.isbast.com'])->send(new EnvioConfirmacion($usuario, $boleta));
        
    }
}
