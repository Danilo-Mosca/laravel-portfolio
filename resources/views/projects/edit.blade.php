@extends('layouts.projects')

@section('title', 'Aggiorna un progetto')

@section('content')

    <form action="{{ route('projects.update', $project->id) }}" method="POST">

        {{-- Inserisco il token che verifica che la chiamata avviene tramite un form del sito: --}}
        @csrf
        {{-- Aggiungiamo all'interno del form il metodo http da passare (PUT o PATCH), perchè di default dal form possiamo passare solo get e post: --}}
        @method('PUT')

        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ $project->name }}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">Cliente:</label>
            <input type="text" name="client" id="client" value="{{ $project->client }}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="type">Tipologia progetto:</label>
            <input type="text" name="type" id="type" value="{{ $project->type }}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="start_date">Inizio dei lavori:</label>
            <input type="text" name="start_date" id="start_date" value="{{ $project->start_date }}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="end_date">Termine dei lavori:</label>
            <input type="text" name="end_date" id="end_date" value="{{ $project->end_date }}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="summary">Descrizione del progetto:</label>
            <textarea name="summary" id="summary" rows="5">{{ $project->summary }}</textarea>
        </div>

        <input type="submit" value="Modifica il post">
        {{-- Oppure: <button>Salva</button> --}}
    </form>

@endsection
