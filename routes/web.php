<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
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

// In questo caso voglio che l'accesso a queste rotte sia visibile solo agli utenti registrati, per fare questo aggiungo un Middleware per permettere questo:
Route::resource('projects', ProjectController::class);

require __DIR__ . '/auth.php';
