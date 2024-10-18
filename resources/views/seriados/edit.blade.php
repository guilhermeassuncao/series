<x-layout title="Editar Seriado {{ $serie->nome }}">
    <x-seriados.form :action="route('seriados.update', $serie->id)" :nome="old('nome', $serie->nome)" :update="true"></x-seriados.form>
</x-layout>
