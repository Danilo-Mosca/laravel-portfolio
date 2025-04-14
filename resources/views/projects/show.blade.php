@extends('layouts.projects')

@section('title', "Project: $project->name")

@section('content')

    {{-- --------------- Sezione pulsanti modifica ed elimina --------------- --}}
    <div class="d-flex py-4 gap-2">
        <a class="btn btn-outline-warning" href="{{ route('projects.edit', $project) }}">Modifica</a>

        {{-- Per il DELETE non possiamo usare un link perchè i link chiamano sempre un metodo get, questo invece deve essere un metodo delete, allora lo facciamo tramite un form nascosto nel pulsante di conferma: --}}

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>
    </div>
    {{-- --------------- Fine sezione pulsanti modifica ed elimina --------------- --}}



    <section class="custom-card p-3">
        <h2 class="mt-2">{{ $project->name }}</h2>

        <small>Inizio lavori progetto: {{ $project->start_date }}</small> - <small>Termine lavori progetto:
            {{ $project->end_date }}</small>

        <section class="mt-3">
            <h3>{{ $project->client }}</h3>

            <h4 class="mt-3">Tipologia: <em>{{ $project->type->name }}</em></h4>
            <p class="mt-3">
                {{ $project->summary }}
            </p>
        </section>



        {{-- Visualizzo le tecnologie associate a questo progetto: --}}
        <p>
            Tecnologie:
            {{-- USO IL forelse() che è un ciclo che se è vuoto, cioè non contiene nessun elemento allora mi restituisce un valore nell'@empty altrimenti me lo esegue normalmente con le istruzioni al suo interno: --}}
            @forelse ($project->technologies as $technology)
                <span class="badge" style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
                {{-- Potevo inserirlo anche così: {{ $technology['color'] }} e {{ $technology['name'] }} --}}
            @empty
                Nessuna tecnologia utilizzata
            @endforelse
        </p>
        {{-- End visualizzazione tecnologie associate a questo progetto: --}}

    </section>



    <!-- Modale richiamato dal pulsante "Elimina" -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi eliminare il progetto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    {{-- Per il DELETE non possiamo usare un link perchè i link chiamano sempre un metodo get, questo invece deve essere un metodo delete, allora lo facciamo tramite un form nascosto nel pulsante di conferma: --}}
                    <form action="{{ route('projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline-danger" value="Elimina">
                        {{-- Ma anche questa è equivalente: 
                            <button class="btn btn-outline-danger">Elimina</button>
                        --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
