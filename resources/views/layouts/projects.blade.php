<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles: istruzione che permette a Laravel di cercare le risorse per Bootstrap ed SCSS: -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>@yield('title')</title>
</head>
<body>

    {{-- Includo il "partials" dell'header con la barra di navigazione: --}}
    @include('partials.header')

    <div class="container body-content">
        @yield('content')
    </div>

        {{-- Includo il "partials" footer con la barra di navigazione: --}}
    @include('partials.footer')
</body>

</html>