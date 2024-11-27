<?php

namespace App\Providers;

use App\Events\SeriadoCriadoEvent;
use App\Listeners\EnviarEmailSobreSeriadoCriado;
use App\Listeners\LogSeriadoCriado;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SeriadoCriadoEvent::class => [
            EnviarEmailSobreSeriadoCriado::class,
            LogSeriadoCriado::class,
        ],
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
