 {{-- Styles: istruzione che permette a Laravel di cercare le risorse per Bootstrap ed SCSS: 
      In questo caso oltre ad importare il file "app.scss" c'è il CSS personalizzato generico, importo
      anche il file "header.scss" (nella cartella "partials") che contiene il CSS specifico per l'header: --}}
 @vite(['resources/sass/app.scss', 'resources/sass/partials/header.scss', 'resources/js/app.js'])

 <header class="mb-5">

     <nav class="navbar navbar-expand-lg bg-body-tertiary">
         <div class="container p-2">
             <a class="navbar-brand" href="#">
                 <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24"
                     class="d-inline-block align-text-top">
             </a>

             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                 aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                 <div class="navbar-nav">
                     <a class="nav-link active" aria-current="page" href="#">Home</a>
                     <a class="nav-link" href="#">Features</a>
                     <a class="nav-link" href="#">Pricing</a>
                     <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                 </div>
             </div>
         </div>
     </nav>
    
</header>