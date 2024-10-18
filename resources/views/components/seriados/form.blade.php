<form action="{{ $action }}" method="post">
    @csrf
    @if($update)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ $nome }}">
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
