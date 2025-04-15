<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Middleware personalizzato con none "admin." e prefisso url "admin/" dove ci raggruppo varie rotte
Route::middleware(['auth', 'verified'])
    ->name("admin.")
    ->prefix("admin")
    ->group(function () {
        // rotta "/admin (all'inizio era /admin/index)" con nome "index"
        Route::get("/", [DashboardController::class, "index"])->name("index");
        // rotta "/admin/profile" con nome "profile"
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    });



// Rotte CRUD del PostController:

// Invece di inserire singolarmente ogni metodo HTTP (GET, POST, PUT, PATCH, DELETE) per ogni operazione su ogni risorsa come nell'esempio di seguito:
// Route::get("", [PostController::class "index"]);

// Laravel ci aiuta con il metodo resources() che genera per noi tutte le rotte necessarie per le nostre CRUD, che poi gestiremo con il controller PostController:
// Route::resource('projects', PostController::class);

// In questo caso voglio rendere l'accesso a tutte le rotte di "projects" solo agli utenti registrati:
Route::resource('projects', ProjectController::class)->middleware('auth', 'verified');

/* Mentre se volessi rendere pubblico a tutti gli utenti l'accesso sotanto alle rotte "index" (visualizzazione di tutti i progetti) e "show" (visualizzazione del singolo progetto) di "projects", mentre le altre rotte devono essere accessibili esclusivamente agli utenti registrati avrei dovuto inserire le seguenti direttive:
*/
// Rotte pubbliche (senza middleware):
// Route::resource('projects', ProjectController::class)->only(['index', 'show']);
// Rotte protette (con middleware auth):
// Route::resource('projects', ProjectController::class)->except(['index', 'show'])->middleware('auth', 'verified');




// Anche qui voglio rendenre privato l'accesso a tutte le rotte di "types" e di "technologies (per aggiungere, modificare e cancellare i tipi di progetto) solo agli utenti registrati:
Route::resource('types', TypeController::class)->middleware('auth', 'verified');
Route::resource('technologies', TechnologyController::class)->middleware('auth', 'verified');

require __DIR__ . '/auth.php';
