<div class="container text-center">
    <div class="row pb-3">
        <div class="col-3 col-md-3">{{ $name }}</div>
        <div class="col-3 col-md-3">{{ $client }}</div>
        <div class="col-3 col-md-2">{{ $start_date }}</div>
        <div class="col-3 col-md-2">{{ $end_date }}</div>
        <div class="col-3 col-md-2"><a class="title-link" href="{{ route('projects.show', $id) }}">Visualizza</a></div>

        <!-- Force next columns to break to new line -->
        {{-- <div class="w-100"></div> --}}
    </div>
</div>
