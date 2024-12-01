<?php

namespace App\Repositories;

use App\Http\Requests\SeriadosFormRequest;
use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;
use App\Models\Seriado;


class EloquentSeriadosRepository implements SeriadosRepository
{
    public function adicionar(array $dados): Seriado
    {
        DB::beginTransaction();

        $seriado = Seriado::query()->create([
            'nome' => $request->nome,
            'capa' => $request->capaCaminho
        ]);
        $temporadas = [];

        for ($i = 1; $i <= $request->numero_temporadas; $i++) {
            $temporadas[] = [
                'seriado_id' => $seriado->id,
                'numero' => $i
            ];
        }

        Temporada::insert($temporadas);

        $episodios = [];

        foreach ($seriado->temporadas as $temporada) {
            for ($j = 1; $j <= $request->episodio_por_temporada; $j++) {
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