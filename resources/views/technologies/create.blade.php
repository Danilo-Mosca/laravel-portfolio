@extends('layouts.projects')

@section('title', 'Aggiungi una tipologia di progetto')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    <form action="{{ route('technologies.store') }}" method="POST">
        {{-- Inserisco il token che verifica che la chiamata avviene tramite un form del sito: --}}
        @csrf

        <div class="mb-3 d-flex flex-column">
            <label for="name">Nome tipologia di progetto:</label>
            <input type="text" name="name" id="name" required />
        </div>

        <div class="mb-3 d-flex flex-column">
            <label for="description">Descrizione della tipologia:</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>

        <div class="mb-3 d-flex gap-3">
            <label for="color">Colore che vuoi assegnare alla tecnologia:</label>
            <input type="color" name="color" value="#344C36" style="border: none; border-radius: 5px; cursor: pointer;" required />
        </div>


        <input type="submit" value="Salva">
        {{-- Oppure:
        <button>Salva</button> 
        --}}
    </form>
@endsection
