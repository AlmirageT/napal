<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ConfirmacionInversion;
use Mail;

class InversionOtrosPagosJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $usuario;
    protected $propiedad;
    protected $sinCaracteres;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($usuario,$propiedad,$sinCaracteres)
    {
        $this->usuario = $usuario;
        $this->propiedad = $propiedad;
        $this->sinCaracteres = $sinCaracteres;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $usuario = $this->usuario;
        $propiedad = $this->propiedad;
        $sinCaracteres = $this->sinCaracteres;

        Mail::to($usuario->correo)->bcc(['pauloberrios@gmail.com','ivan.saez@informatica.isbast.com'])->send(new ConfirmacionInversion($propiedad,$sinCaracteres));

    }
}
