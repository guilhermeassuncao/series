<x-layout title="Séries">
    @auth
        <a href="{{ route('seriados.create') }}" class="btn btn-dark mb-2">Adicionar nova série</a>
    @endauth


    <ul class="list-group mt-4">
        @foreach ($seriados as $seriado)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @auth<a
                    href="{{ route('temporadas.index', $seriado->id) }}">@endauth{{ $seriado->nome }}@auth</a>@endauth

                @auth
                    <span class="d-flex">
                        <a href="{{ route('seriados.edit', $seriado->id) }}" class="btn btn-primary btn-sm mr-1">Editar</a>

                        <form action="{{ route('seriados.destroy', $seriado->id) }}" method="POST" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $seriado->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">x</button>
                        </form>
                    </span>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>
