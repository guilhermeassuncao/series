<x-layout title="Temporadas de {{ $seriado->nome }}">
    <ul class="list-group mt-4">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodios.index', $temporada->id) }}">Temporada - {{ $temporada->numero }}</a>

                <span class="badge bg-secondary">
                    {{ $temporada->numeroEpisodiosAssistidos() }} / {{ $temporada->episodios->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
