<x-layout title="Novo Seriado">
    <x-seriados.form :action="route('seriados.store')" :update="false" :nome="old('nome')"></x-seriados.form>
</x-layout>
