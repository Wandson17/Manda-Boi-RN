<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/ingresso/create/{id}', [App\Http\Controllers\IngressoController::class, 'create'])
        ->name('ingresso.create'); 
    Route::post('/ingresso/store/{id}', [App\Http\Controllers\IngressoController::class, 'store'])
        ->name('ingresso.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/ingresso/usuario/create/{festa}', [App\Http\Controllers\IngressoUsuarioController::class, 'create'])
        ->name('ingresso.usuario.create'); 
    Route::post('/ingresso/usuario/store', [App\Http\Controllers\IngressoUsuarioController::class, 'store'])
        ->name('ingresso.usuario.store');
    
    Route::get('/ingresso/usuario/confirmation/{id}', [App\Http\Controllers\IngressoUsuarioController::class, 'confirmation'])
        ->name('ingresso.usuario.confirmation');
});