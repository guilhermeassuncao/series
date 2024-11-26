<?php

namespace App\Repositories;
use App\Models\Seriado;
use App\Http\Requests\SeriadosFormRequest;

interface SeriadosRepository
{
    public function adicionar(SeriadosFormRequest $request): Seriado;
}