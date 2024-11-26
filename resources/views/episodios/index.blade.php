<x-layout title="Episódios">
    <form method="POST">
        @csrf
        <ul class="list-group mt-4">
            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio - {{ $episodio->numero }}

                    <input 
                        type="checkbox" 
                        name="episodios[]" 
                        value="{{ $episodio->id }}"
                        @checked($episodio->assistido)
                    >
                </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary my-4">Salvar</button>
    </form>
</x-layout>
