<?php

namespace App\Listeners;

use App\Events\SeriadoCriadoEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogSeriadoCriado implements ShouldQueue
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
        Log::info("Seriado criado: $event->nome, $event->id, $event->numero_temporadas, $event->episodio_por_temporada");
    }
}
