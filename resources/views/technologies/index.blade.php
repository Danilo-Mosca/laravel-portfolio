@extends('layouts.projects')

{{-- Restituisco il titolo della pagina con il metodo abbreviato: --}}
@section('title', 'Tutte le tecnologie')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    {{-- @dd($projects); --}}



    {{-- --------------- Sezione pulsante aggiungi un tecnologia --------------- --}}
    <div class="d-flex py-4 gap-2">
        <a class="btn btn-outline-success" href="{{ route('technologies.create') }}">Aggiungi una tecnologia</a>
    </div>
    {{-- --------------- Fine sezione pulsante aggiungi un tecnologia --------------- --}}



    {{-- ---------- Sessione temporanea che mostra una notifica, un alert con un messaggio di successo nel caso in cui una technology viene cancellata con successo ----------  --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- ---------- Fine sessione temporanea che mostra una notifica, un alert con un messaggio di successo nel caso in cui una technology viene cancellata con successo ----------  --}}



    <section class="custom-card pt-5 pb-5">
        @foreach ($technologies as $technology)
            {{-- Inserendo i tag <x-nome_componente>...</x-nome_componente> inserisco un componente, in questo caso inserisco il componente card (<x-card> </x-card>): --}}
            <div class="container">
                <div class="row pb-5">
                    <div class="col-3 col-md-12 mb-3" style="color: {{ $technology->color }};">{{ $technology->name }}</div>
                    <div class="col-3 col-md-2 mb-3 text-uppercase"><span
                            style="background-color: {{ $technology->color }}; border-radius: 10px; padding:5px 10px; color: white;">Tag</span>
                    </div>
                    <div class="col-12 col-md-5 mb-3">{{ $technology->description }}</div>
                    {{-- --------------- Sezione pulsanti modifica ed elimina --------------- --}}
                    <div class="col-12 col-md-4 d-flex justify-content-md-center align-items-center gap-3 mb-3">
                        <a class="btn btn-outline-warning" href="{{ route('technologies.edit', $technology) }}">Modifica</a>

                        {{-- Per il DELETE non possiamo usare un link perchè i link chiamano sempre un metodo get, questo invece deve essere un metodo delete, allora lo facciamo tramite un form nascosto nel pulsante di conferma: --}}

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Elimina
                        </button>
                    </div>
                    {{-- --------------- Fine sezione pulsanti modifica ed elimina --------------- --}}
                </div>
            </div>
        @endforeach
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
                    Vuoi davvero eliminare il tipo di tecnologia?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    {{-- Per il DELETE non possiamo usare un link perchè i link chiamano sempre un metodo get, questo invece deve essere un metodo delete, allora lo facciamo tramite un form nascosto nel pulsante di conferma: --}}
                    <form action="{{ route('technologies.destroy', $technology) }}" method="POST">
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
