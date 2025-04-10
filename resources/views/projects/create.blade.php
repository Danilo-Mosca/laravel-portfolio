@extends('layouts.projects');

@section('title', 'Aggiungi un progetto')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    <form action="{{ route('projects.store') }}" method="POST">
        {{-- Inserisco il token che verifica che la chiamata avviene tramite un form del sito: --}}
        @csrf

        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">Cliente:</label>
            <input type="text" name="client" id="client">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="type">Tipologia progetto:</label>
            <input type="text" name="type" id="type">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="start_date">Inizio dei lavori:</label>
            <input type="text" name="start_date" id="start_date">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="end_date">Termine dei lavori:</label>
            <input type="text" name="end_date" id="end_date">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="summary">Descrizione del progetto:</label>
            <textarea name="summary" id="summary" rows="5"></textarea>
        </div>

        <input type="submit" value="Salva">
        {{-- Oppure:
        <button>Salva</button> 
        --}}
    </form>
@endsection
