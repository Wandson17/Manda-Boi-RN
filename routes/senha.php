<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/senha/usuario/create/{corrida}', [App\Http\Controllers\SenhaUserController::class, 'create'])
        ->name('senha.usuario.create'); 
    Route::post('/senha/usuario/store', [App\Http\Controllers\SenhaUserController::class, 'store'])
        ->name('senha.usuario.store');
    
    Route::get('/senha/usuario/show/{id}', [App\Http\Controllers\SenhaUserController::class, 'show'])
        ->name('senha.usuario.show');

    Route::get('/senha/usuario/confirmation/{senha}', [App\Http\Controllers\SenhaUserController::class, 'confirmation'])
        ->name('senha.usuario.confirmation');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/senha', [App\Http\Controllers\SenhaController::class, 'index'])
        ->name('senha.usuario.index');

    Route::get('/senha/destroy/{id}', [App\Http\Controllers\SenhaUserController::class, 'destroy'])
        ->name('senha.destroy');
});

Route::get('/senha/{corrida}/{categoria}', [App\Http\Controllers\SenhaUserController::class, 'getSenhasByCategoria'])
        ->name('senha.getSenhasByCategoria');