<?php

namespace App\Services;

use App\Events\SeriadoCriadoEvent;
use App\Models\Seriado;
use App\Repositories\SeriadosRepository;

class SeriadoService
{
    private SeriadosRepository $repository;

    public function __construct(SeriadosRepository $repository)
    {
        $this->repository = $repository;
    }


    public function criarSeriado(array $dados): Seriado
    {

        $seriado = $this->repository->adicionar($dados);

//        $capaCaminho = $request->file('capa')->store('seriados_capa', 'public');
//
//        $dadosValidados = $request->validated();
//
//        $request->capaCaminho = $capaCaminho;
//
//        SeriadoCriadoEvent::dispatch(
//            $seriado->nome,
//            $seriado->id,
//            $dadosValidados['numero_temporadas'],
//            $dadosValidados['episodio_por_temporada']
//        );

    return new Seriado();

    }
}

