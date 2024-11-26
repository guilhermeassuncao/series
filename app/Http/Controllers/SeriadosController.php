<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriadosFormRequest;
use App\Models\Seriado;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Repositories\SeriadosRepository;

class SeriadosController extends Controller
{
    public function __construct()
    {
        $this->middleware(Autenticador::class);
    }

    public function index(): View
    {
        $seriados = Seriado::query()->orderBy('nome')->get();

        return view('seriados.index', compact('seriados'));
    }

    public function create(): View
    {
        return view('seriados.create');
    }

    public function store(SeriadosFormRequest $request, SeriadosRepository $repository): RedirectResponse
    {
        $seriado = $repository->adicionar($request);

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
