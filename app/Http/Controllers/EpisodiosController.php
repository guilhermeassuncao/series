<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {
        $episodios = $temporada->episodios;

        return view('episodios.index', compact('episodios'));
    }

    public function update(Request $request, Temporada $temporada)
    {
        $episodiosAssistidos = $request->episodios;

        $temporada->episodios->each(function (Episodio $episodio) use ($episodiosAssistidos) {
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });

        $temporada->push();

        return to_route('episodios.index', $temporada->id)->with('sucesso', "Episódios marcados como assistidos");
    }
}
