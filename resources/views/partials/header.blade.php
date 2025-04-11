 {{-- Styles: istruzione che permette a Laravel di cercare le risorse per Bootstrap ed SCSS: 
      In questo caso oltre ad importare il file "app.scss" c'è il CSS personalizzato generico, importo
      anche il file "header.scss" (nella cartella "partials") che contiene il CSS specifico per l'header: --}}
 @vite(['resources/sass/app.scss', 'resources/sass/partials/header.scss', 'resources/js/app.js'])

 <header class="mb-5">

     <nav class="navbar navbar-expand-lg bg-body-tertiary">
         <div class="container p-2">
             <a class="navbar-brand" href="{{ route('projects.index') }}">
                 <img src="{{ Vite::asset('resources/img/logo_portfolio.png') }}" alt="Logo" width="30"
                     height="24" class="d-inline-block align-text-top">
             </a>

             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                 <div class="navbar-nav">

                     {{-- Per rendere dinamica la classe active sui pulsanti del menu è possibile utilizzare l'helper:
                    Route::is() o request()->routeIs() direttamente dentro i tag blade. Ecco l'esempio: --}}
                     <a class="nav-link {{ request()->routeIs('projects.index') ? 'active' : '' }}" aria-current="page"
                         href="{{ route('projects.index') }}">Home</a>
                     {{-- Nell'esempio verifico se la rotta in cui siamo attualmente è "projects.index" o no, in caso lo sia allora con l'operatore ternario visualizzo la classe active, altrimenti la nascondo. L'esempio di sopra può essere fatto anche richiamando il metodo statico is() nella classe "facace" Route, come di seguito: --}}
                     {{-- {{ Route::is('projects.index') ? 'active' : '' }} --}}

                     <a class="nav-link {{ request()->routeIs('projects.create') ? 'active' : '' }}"
                         href="{{ route('projects.create') }}">Create Projects</a>
                     <a class="nav-link" href="#">Pricing</a>
                     <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                 </div>
             </div>
         </div>
     </nav>

 </header>
