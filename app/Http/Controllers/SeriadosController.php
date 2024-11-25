<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriadosFormRequest;
use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;
use App\Models\Seriado;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SeriadosController extends Controller
{
    public function index(): View
    {
        $seriados = Seriado::query()->orderBy('nome')->get();

        return view('seriados.index', compact('seriados'));
    }

    public function create(): View
    {
        return view('seriados.create');
    }

    public function store(SeriadosFormRequest $request): RedirectResponse
    {
        $seriado = Seriado::query()->create(($request->all()));
        $temporadas = [];

        for ($i = 1; $i <= $request->numeroTemporadas; $i++) {
            $temporadas[] = [
                'seriado_id' => $seriado->id,
                'numero' => $i
            ];
        }

        Temporada::insert($temporadas);
        
        $episodios = [];

        foreach ($seriado->temporadas() as $tempora) {
            for ($j = 1; $j <= $request->episodioPorTemporada; $j++) {
                $episodios[] = [
                    'temporada_id' => $tempora->id,
                    'numero' => $j
                ];
            } 
        }

        Episodio::insert($episodios);


        return to_route('seriados.index')->with('sucesso', "Série $seriado->nome criada com sucesso");
    }

    public function destroy(Seriado $seriado): RedirectResponse
    {
        $seriado->delete();

        return to_route('seriados.index')->with('sucesso', "Série $seriado->nome removida com sucesso");
    }

    public function edit(Seriado $seriado): View
    {
        return view('seriados.edit')->with('serie', $seriado);
    }

    public function update(Seriado $seriado, SeriadosFormRequest $request): RedirectResponse
    {
        $seriado->nome = $request->input('nome');
        $seriado->save();

        return to_route('seriados.index')->with('sucesso', "Série $seriado->nome alterada com sucesso");
    }
}
