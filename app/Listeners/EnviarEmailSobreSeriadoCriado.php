<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SeriadoCriado;
use App\Events\SeriadoCriadoEvent;
use App\Models\User;
use Illuminate\Support\Facades\Mail;



class EnviarEmailSobreSeriadoCriado implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SeriadoCriadoEvent $event): void
    {
        $listaUsuarios = User::all();

        foreach ($listaUsuarios as $indice => $usuario) {
            $email = new SeriadoCriado(
                $event->nome,
                $event->id,
                $event->numeroTemporadas,
                $event->episodioPorTemporada,
            );

            $tempo = now()->addSeconds($indice * 5);

            $email->subject = "event {$event->nome} criado";

            Mail::to($usuario)->later($tempo, $email);
        }
    }
}
