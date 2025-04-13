@extends('layouts.projects')

@section('title', 'Aggiungi una tipologia di progetto')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    <form action="{{ route('types.store') }}" method="POST">
        {{-- Inserisco il token che verifica che la chiamata avviene tramite un form del sito: --}}
        @csrf

        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Nome tipologia di progetto:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="description">Descrizione della tipologia:</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>

        <input type="submit" value="Salva">
        {{-- Oppure:
        <button>Salva</button> 
        --}}
    </form>
@endsection