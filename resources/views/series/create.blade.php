<x-layout title="Nova Série" :nome="old('nome')">
    <x-series.form :action="route('series.store')" :update="false"></x-series.form>
</x-layout>
