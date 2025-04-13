<div class="container text-center">
    <div class="row pb-3 pe-3">
        <div class="col-3 col-md-3 p-2">{{ $name }}</div>
        <div class="col-6 col-md-7 text-start">{{ $description }}</div>
        <div class="col-3 col-md-2 text-start"><a class="title-link" href="{{ route('types.show', $id) }}">Visualizza</a></div>

        <!-- Force next columns to break to new line -->
        {{-- <div class="w-100"></div> --}}
    </div>
</div>
