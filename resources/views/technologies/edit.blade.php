@extends('layouts.projects')

@section('title', 'Aggiorna una tecnologia')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    <form action="{{ route('technologies.update', $technology) }}" method="POST">
        {{-- Inserisco il token che verifica che la chiamata avviene tramite un form del sito: --}}
        @csrf
        {{-- Aggiungiamo all'interno del form il metodo http da passare (PUT o PATCH), perchè di default dal form possiamo passare solo get e post: --}}
        @method('PUT')

        <div class="mb-3 d-flex flex-column">
            <label for="name">Nome tipologia di progetto:</label>
            <input type="text" name="name" id="name" value="{{ $technology->name }}" required />
        </div>

        <div class="mb-3 d-flex flex-column">
            <label for="description">Descrizione della tipologia:</label>
            <textarea name="description" id="description" rows="5">{{ $technology->description }}</textarea>
        </div>

        <div class="mb-3 d-flex gap-3">
            <label for="color">Colore che vuoi assegnare alla tecnologia:</label>
            <input type="color" name="color" value="{{ $technology->color }}"
                style="border: none; border-radius: 5px; cursor: pointer;" required />
        </div>


        <input type="submit" value="Salva">
        {{-- Oppure:
        <button>Salva</button> 
        --}}
    </form>
@endsection
