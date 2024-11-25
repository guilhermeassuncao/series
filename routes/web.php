<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriadosController;
use App\Http\Controllers\TemporadasController;

Route::get('/', function () {
    return redirect('/seriados');
});

Route::resource('seriados', SeriadosController::class)->except(['show']);

Route::get('/seriados/{seriado}/temporadas', [TemporadasController::class, 'index'])->name('temporadas.index');
