@extends('layouts.projects')

{{-- Restituisco il titolo della pagina con il metodo abbreviato: --}}
@section('title', 'Tutti i progetti')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    {{-- @dd($projects); --}}



    {{-- --------------- Sezione pulsante aggiungi un progetto --------------- --}}
    <div class="d-flex py-4 gap-2">
        <a class="btn btn-outline-success" href="{{ route('projects.create') }}">Aggiungi un progetto</a>
    </div>
    {{-- --------------- Fine sezione pulsante aggiungi un progetto --------------- --}}



    <section class="custom-card pt-5 pb-5">

        <div class="container text-center">
            <div class="row pb-3 pe-3">
                <div class="col-3 col-md-3 text-uppercase">Nome</div>
                <div class="col-3 col-md-3 text-uppercase">Cliente</div>
                <div class="col-3 col-md-2 text-uppercase">Data inizio progetto</div>
                <div class="col-3 col-md-2 text-uppercase">Data fine progetto</div>
                {{-- Con .d-none .d-sm-block nascondo la colonna solo su xs --}}
                <div class="col-md-2 text-uppercase d-none d-sm-block">Visualizza progetto</div>
            </div>
        </div>

        @foreach ($projects as $project)
            {{-- Inserendo i tag <x-nome_componente>...</x-nome_componente> inserisco un componente, in questo caso inserisco il componente card (<x-card> </x-card>): --}}
            <x-card>
                <x-slot:name>{{ $project->name }}</x-slot:name>
                <x-slot:client>{{ $project->client }}</x-slot:client>
                <x-slot:start_date>{{ $project->start_date }}</x-slot:start_date>
                <x-slot:end_date>{{ $project->end_date }}</x-slot:end_date>
                <x-slot:id>{{ $project->id }} </x-slot:id>
            </x-card>
        @endforeach

    </section>

@endsection