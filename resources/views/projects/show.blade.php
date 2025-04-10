@extends('layouts.projects')

@section('title', "Project: $project->name")

@section('content')

    <section class="custom-card p-3">
        <h2 class="mt-2">{{ $project->name }}</h2>

        <small>Start date: {{ $project->start_date }}</small> - <small>End date: {{ $project->end_date }}</small>

        <section class="mt-3">
            <h3>{{ $project->client }}</h3>
            <p>
                {{ $project->summary }}
            </p>
        </section>

    </section>

@endsection
