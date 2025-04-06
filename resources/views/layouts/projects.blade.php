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

    <div class="container">
        @yield('content')
    </div>

</body>

</html>