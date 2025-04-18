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
            <input type="text" name="name" id="name" value="{{ $project->name }}" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">Cliente:</label>
            <input type="text" name="client" id="client" value="{{ $project->client }}" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="type_id">Tipologia progetto:</label>
            <select name="type_id" id="type_id" required>
                @foreach ($types as $type)
                    {{-- Visualizzo il name del type, ma come valore gli passo l'id, perchè è questo che andremo ad inserire nella colonna "type_id" della tabella "projects" --}}
                    <option value="{{ $type->id }}" {{ $type->id == $project->type_id ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- technologies utilizzate --}}
        <div class="form-control mb-3 d-flex flex-wrap">
            @foreach ($technologies as $technology)
                <div class="technology me-3">
                    <input type="checkbox" name="tecnologie[]" id="technology-{{ $technology->id }}"
                        value="{{ $technology->id }}"
                        {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                    {{-- Nella riga di sopra verifico con l'operatore ternario se quel valore è presente, se così lo spunto come checked: --}}
                    <label for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
            @endforeach
        </div>
        {{-- end technologies utilizzate --}}

        <div class="form-control mb-3 d-flex flex-column">
            <label for="start_date">Inizio dei lavori:</label>
            <input type="date" id="start_date" name="start_date" value="{{ $project->start_date }}" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="end_date">Termine dei lavori:</label>
            <input type="date" id="end_date" name="end_date" value="{{ $project->end_date }}" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="summary">Descrizione del progetto:</label>
            <textarea name="summary" id="summary" rows="5">{{ $project->summary }}</textarea>
        </div>

        <input type="submit" value="Modifica il post">
        {{-- Oppure: <button>Salva</button> --}}
    </form>

@endsection
