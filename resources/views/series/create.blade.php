<x-layout title="Nova Série" :nome="old('nome')" :update="false">
    <x-series.form :action="route('series.store')"></x-series.form>
</x-layout>
