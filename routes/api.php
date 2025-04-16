<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Mostra tutti i progetti:
Route::get('projects', [ProjectController::class, 'index']);     //questa rotta risponderà all'indirizzo: http://127.0.0.1:8000/api/projects

// Mostra il singolo progetto:
Route::get('projects/{project}', [ProjectController::class, 'show']);   //questa rotta risponderà all'indirizzo: http://127.0.0.1:8000/api/project{id-del-project}