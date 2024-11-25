<x-layout title="Temporadas de {{$seriado->nome}}">
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Temporada - {{ $temporada->numero }}

                <span class="badge bg-secondary">
                    {{$temporada->episodios->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>