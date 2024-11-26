<?php

use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Mail\SeriadoCriado;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriadosController;
use App\Http\Controllers\TemporadasController;
use App\Http\Middleware\Autenticador;

Route::middleware(Autenticador::class)->group(function () {
    Route::get('/', function () {
        return redirect('/seriados');
    });

    Route::resource('seriados', SeriadosController::class)->except(['show']);

    Route::get('/seriados/{seriado}/temporadas', [TemporadasController::class, 'index'])->name('temporadas.index');

    Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class, 'index'])->name('episodios.index');
    Route::post('/temporadas/{temporada}/episodios', [EpisodiosController::class, 'update'])->name('episodios.update');
});



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

Route::get('registrar', [UsersController::class, 'create'])->name('users.create');
Route::post('registrar', [UsersController::class, 'store'])->name('users.store');

Route::get('/email', function () {
    return new SeriadoCriado(
        "Game of Thrones",
        5,
        10,
        24
    );
});


