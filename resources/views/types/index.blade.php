@extends('layouts.projects')

{{-- Restituisco il titolo della pagina con il metodo abbreviato: --}}
@section('title', 'Tutti i tipi di progetti')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    {{-- @dd($types); --}}



    {{-- --------------- Sezione pulsante aggiungi una tipologia di progetto --------------- --}}
    <div class="d-flex py-4 gap-2">
        <a class="btn btn-outline-success" href="{{ route('types.create') }}">Aggiungi una tipologia di progetto</a>
    </div>
    {{-- --------------- Fine sezione pulsante aggiungi una tipologia di progetto --------------- --}}



    {{-- ---------- Sessione temporanea che mostra una notifica, un alert con un messaggio di successo nel caso in cui il type viene cancellato con successo ----------  --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- ---------- Fine sessione temporanea che mostra una notifica, un alert con un messaggio di successo nel caso in cui il type viene cancellato con successo ----------  --}}



    <section class="custom-card pt-5 pb-5">

        <div class="container text-center">
            <div class="row pb-3 pe-5">
                <div class="col-3 col-md-3 text-uppercase">Nome</div>
                <div class="col-6 col-md-7 text-uppercase">Descrizione</div>
                <div class="col-3 col-md-2 text-uppercase">Visualizza la tipologia</div>
            </div>
        </div>

        @foreach ($types as $type)
            {{-- Nascondo dalla lista dei type quello predefinito, che è il type con id uguale a 1 --}}
            @if ($type->id == 1)
                @php
                    continue;
                @endphp
            @endif


            {{-- Inserendo i tag <x-nome_componente>...</x-nome_componente> inserisco un componente, in questo caso inserisco il componente typeCard (<x-typeCard> </x-typeCard>): --}}
            <x-typeCard>
                <x-slot:name>{{ $type->name }}</x-slot:name>
                <x-slot:description>{{ $type->description }}</x-slot:description>
                <x-slot:id>{{ $type->id }}</x-slot:id>
            </x-typeCard>
        @endforeach

    </section>

@endsection
