<x-layout title="Novo Seriado">
    <form action="{{ route('seriados.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome</label>
                <input autofocus type="text" name="nome" id="nome" class="form-control"
                    value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="numero_temporadas" class="form-label">Nº Temporadas</label>
                <input type="text" name="numero_temporadas" id="numero_temporadas" class="form-control"
                    value="{{ old('numero_temporadas') }}">
            </div>
            <div class="col-2">
                <label for="episodio_por_temporada" class="form-label">Eps / Temporada</label>
                <input type="text" name="episodio_por_temporada" id="episodio_por_temporada" class="form-control"
                    value="{{ old('episodio_por_temporada') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="capa" class="form-label">Capa</label>
                <input type="file" name="capa" id="capa" class="form-control" value="{{ old('capa') }}"
                    accept="image/gif, image/jpeg, image/png">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
