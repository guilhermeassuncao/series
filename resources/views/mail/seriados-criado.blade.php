@component('mail::message')
    # {{ $nomeSeriado }} criado com sucesso!

    A série {{ $nomeSeriado }} com {{ $qtdTemporadas }} temporadas e {{ $qtdEpisodios }} episódios foi criada com sucesso!

    Acesse aqui:

    @component('mail::button', ['url' => route('temporadas.index', $idSeriado)])
        Ver série
    @endcomponent
@endcomponent
