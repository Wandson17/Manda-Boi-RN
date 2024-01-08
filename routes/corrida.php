<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/corrida/create', [App\Http\Controllers\CorridaController::class, 'create'])
        ->name('corrida.create'); 
    Route::get('/corrida', [App\Http\Controllers\CorridaController::class, 'index'])
        ->name('corrida.index');
    Route::post('/corrida/store', [App\Http\Controllers\CorridaController::class, 'store'])
        ->name('corrida.store');
    Route::get('/corrida/edit/{id}', [App\Http\Controllers\CorridaController::class, 'edit'])
        ->name('corrida.edit');
    Route::post('/corrida/update/{id}', [App\Http\Controllers\CorridaController::class, 'update'])
        ->name('corrida.update');
    Route::get('/corrida/editInformation/{id}', [App\Http\Controllers\CorridaController::class, 'editInformation'])
        ->name('corrida.editInformation');
    Route::post('/corrida/editInformation/{id}', [App\Http\Controllers\CorridaController::class, 'storeInformation'])
        ->name('corrida.storeInformation');
    Route::get('/corrida/destroy/{id}', [App\Http\Controllers\CorridaController::class, 'destroy'])
        ->name('corrida.destroy');

    // SENHAS
    Route::get('/corrida/senha/create/{corrida}', [App\Http\Controllers\SenhaController::class, 'create'])
        ->name('senha.create');
    Route::post('/corrida/senha/store', [App\Http\Controllers\SenhaController::class, 'store'])
        ->name('senha.store');

});

Route::get('/corrida/show/{id}', [App\Http\Controllers\CorridaController::class, 'show'])
        ->name('corrida.show');

Route::get('/teste', fn () => view('corrida.teste'));