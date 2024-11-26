<?php

namespace App\Repositories;

use App\Http\Requests\SeriadosFormRequest;
use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;
use App\Models\Seriado;


class EloquentSeriadosRepository implements SeriadosRepository
{
    public function adicionar(SeriadosFormRequest $request): Seriado
    {
        DB::beginTransaction();

        $seriado = Seriado::query()->create($request->all());
        $temporadas = [];

        for ($i = 1; $i <= $request->numeroTemporadas; $i++) {
            $temporadas[] = [
                'seriado_id' => $seriado->id,
                'numero' => $i
            ];
        }

        Temporada::insert($temporadas);

        $episodios = [];

        foreach ($seriado->temporadas as $temporada) {
            for ($j = 1; $j <= $request->episodioPorTemporada; $j++) {
                $episodios[] = [
                    'temporada_id' => $temporada->id,
                    'numero' => $j
                ];
            }
        }

        Episodio::insert($episodios);

        DB::commit();

        return $seriado;
    }
}