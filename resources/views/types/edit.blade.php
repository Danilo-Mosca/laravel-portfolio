@extends('layouts.projects')

@section('title', 'Aggiorna una tipologia di progetto')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    <form action="{{ route('types.update', $type) }}" method="POST">
        {{-- Inserisco il token che verifica che la chiamata avviene tramite un form del sito: --}}
        @csrf
        {{-- Aggiungiamo all'interno del form il metodo http da passare (PUT o PATCH), perchè di default dal form possiamo passare solo get e post: --}}
        @method('PATCH')

        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Nome tipologia di progetto:</label>
            <input type="text" name="name" id="name" value="{{ $type->name }}" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="description">Descrizione della tipologia di progetto:</label>
            <textarea name="description" id="description" rows="5">{{ $type->description }}</textarea>
        </div>

        <input type="submit" value="Salva">
        {{-- Oppure:
        <button>Salva</button> 
        --}}
    </form>
@endsection
