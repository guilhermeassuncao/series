<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriadosController;

Route::get('/', function () {
    return redirect('/seriados');
});

Route::resource('seriados', SeriadosController::class)->except(['show']);
