<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'isAdmin'])->group(function () {
    // FESTA
    Route::get('/festa/create/{id}', [App\Http\Controllers\FestaController::class, 'create'])
        ->name('festa.create'); 
    Route::get('/festa', [App\Http\Controllers\FestaController::class, 'index'])
        ->name('festa.index');
    Route::post('/festa/store', [App\Http\Controllers\FestaController::class, 'store'])
        ->name('festa.store');
    Route::get('/festa/edit/{id}', [App\Http\Controllers\FestaController::class, 'edit'])
        ->name('festa.edit');
    Route::post('/festa/update/{id}', [App\Http\Controllers\FestaController::class, 'update'])
        ->name('festa.update');
    Route::get('/festa/editInformation/{id}', [App\Http\Controllers\FestaController::class, 'editInformation'])
        ->name('festa.editInformation');
    Route::post('/festa/editInformation/{id}', [App\Http\Controllers\FestaController::class, 'storeInformation'])
        ->name('festa.storeInformation');
    Route::get('/festa/destroy/{id}', [App\Http\Controllers\FestaController::class, 'destroy'])
        ->name('festa.destroy');
    // INGRESSOS
    Route::get('/festa/createIngressos/{id}', [App\Http\Controllers\FestaController::class, 'createIngressos'])
        ->name('festa.createIngressos');
});

Route::get('/festa/show/{id}', [App\Http\Controllers\FestaController::class, 'show'])
        ->name('festa.show');