<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;

Route::get('/', [SalaController::class, 'index']);

Route::get('/salas/create', [SalaController::class, 'create'])->middleware('auth');

Route::get('/salas/{id}', [SalaController::class, 'show']);

//Route::get('/salas/{id}/edit', [SalaController::class, 'edit']);

Route::post('/salas', [SalaController::class, 'store']);

Route::get('/contatos', function () {
    return view('contact');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
