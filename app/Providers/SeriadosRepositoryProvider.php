<?php

namespace App\Providers;

use App\Repositories\EloquentSeriadosRepository;
use App\Repositories\SeriadosRepository;
use Illuminate\Support\ServiceProvider;

class SeriadosRepositoryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SeriadosRepository::class, EloquentSeriadosRepository::class);
    }
}
