 {{-- Styles: istruzione che permette a Laravel di cercare le risorse per Bootstrap ed SCSS: 
      In questo caso oltre ad importare il file "app.scss" c'è il CSS personalizzato generico, importo
      anche il file "footer.scss" (nella cartella "partials") che contiene il CSS specifico per l'footer: --}}
 @vite(['resources/sass/app.scss', 'resources/sass/partials/footer.scss', 'resources/js/app.js'])

 <div>
     <footer>
         <div class="container">
             <p class="line-height-footer">Footer del Portfolio</p>
         </div>
     </footer>
 </div>
