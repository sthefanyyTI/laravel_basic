<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;

Route::get('/', [SalaController::class, 'index']);

Route::get('/salas/create', [SalaController::class, 'create'])->middleware('auth');

Route::get('/salas/{id}', [SalaController::class, 'show']);

//Route::get('/salas/{id}/edit', [SalaController::class, 'edit']);

Route::post('/salas', [SalaController::class, 'store']);

Route::delete('/salas/{id}', [SalaController::class, 'destroy'])->middleware('auth');

Route::get('/salas/edit/{id}', [SalaController::class, 'edit'])->middleware('auth');

//Route::put('/salas/{id}', [SalaController::class, 'update'])->middleware('auth');

Route::put('/salas/{id}', [SalaController::class, 'update'])->name('salas.update');

Route::get('/contatos', function () {
    return view('contact');
});

Route::get('/dashboard', [SalaController::class, 'dashboard'])->middleware('auth');

