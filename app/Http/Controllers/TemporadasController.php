<?php

namespace App\Http\Controllers;

use App\Models\Seriado;

class TemporadasController extends Controller
{
    public function index(Seriado $seriado)
    {
        $temporadas = $seriado->temporadas()->with('episodios')->get();

        return view("temporadas.index", compact("temporadas", "seriado"));
    }
}
