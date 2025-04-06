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
        <th>Riassunto progetto</th>

        @foreach ($projects as $project)

        <tr>
            <td>{{$project->name}}</td>
            <td>{{$project->client}}</td>
            {{-- Posso richiamarli anche così: --}}
            <td>{{$project['start_date']}}</td>
            <td>{{$project['end_date']}}</td>
            <td>{{$project['summary']}}</td>
        </tr>
        @endforeach
    </table>
@endsection
