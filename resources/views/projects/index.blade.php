@extends('layouts.projects')

{{-- Restituisco il titolo della pagina con il metodo abbreviato: --}}
@section('title', 'Tutti i progetti')

{{-- Section con il contenuto personalizzato: --}}
@section('content')
    {{-- @dd($projects); --}}


    <table>
        <th>Nome</th>
        <th>Cliente</th>
        <th>Data inizio progetto</th>
        <th>Data fine progetto</th>
        <th>Visualizza progetto</th>

        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->client }}</td>
                {{-- Posso richiamarli anche così: --}}
                <td>{{ $project['start_date'] }}</td>
                <td>{{ $project['end_date'] }}</td>
                {{-- <td>{{$project['summary']}}</td> --}}

                {{-- al metodo route() che restituisce l'indirizzo dell'url gli passo anche il parametro $project così da reindirizzare su quello specifico id, esempio: http://127.0.0.1:8000/projects/10  <---- 10 è il $project passatogli --}}
                {{-- avrei potuto inserire anche l'id:
                    <a href="{{ route('projects.show', $project->id) }}">Visualizza il project</a> --}}
                <td><a href="{{ route('projects.show', $project) }}">Visualizza</a></td>
            </tr>
        @endforeach
    </table>
@endsection
