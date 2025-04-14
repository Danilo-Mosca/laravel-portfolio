@extends('layouts.projects');

@section('title', 'Aggiungi un progetto')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    <form action="{{ route('projects.store') }}" method="POST">
        {{-- Inserisco il token che verifica che la chiamata avviene tramite un form del sito: --}}
        @csrf

        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">Cliente:</label>
            <input type="text" name="client" id="client">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="type_id">Tipologia progetto:</label>
            <select name="type_id" id="type_id" required>
                @foreach ($types as $type)
                    {{-- Visualizzo il name del type, ma come valore gli passo l'id, perchè è questo che andremo ad inserire nella colonna "type_id" della tabella "projects" --}}
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- technologies utilizzate --}}
        <div class="form-control mb-3 d-flex flex-wrap">
            @foreach ($technologies as $technology)
                <div class="technology me-3">
                    <input type="checkbox" name="tecnologie[]" id="technology-{{ $technology->id }}"
                        value="{{ $technology->id }}">
                    <label for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
            @endforeach
        </div>
        {{-- end technologies utilizzate --}}

        <div class="form-control mb-3 d-flex flex-column">
            <label for="start_date">Inizio dei lavori:</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="end_date">Termine dei lavori:</label>
            <input type="date" id="end_date" name="end_date" required>
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
