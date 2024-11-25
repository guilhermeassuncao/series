<x-layout title="Novo Seriado">
    <form action="{{ route('seriados.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome</label>
                <input autofocus type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="numeroTemporadas" class="form-label">Nº Temporadas</label>
                <input type="text" name="numeroTemporadas" id="numeroTemporadas" class="form-control" value="{{ old('numeroTemporadas') }}">
            </div>
            <div class="col-2">
                <label for="episodioPorTemporada" class="form-label">Eps / Temporada</label>
                <input type="text" name="episodioPorTemporada" id="episodioPorTemporada" class="form-control" value="{{ old('episodioPorTemporada') }}">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
