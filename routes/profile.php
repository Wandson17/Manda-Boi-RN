<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('/profile/senhas', [App\Http\Controllers\ProfileController::class, 'mySenhas'])->name('profile.senhas');
    Route::get('/profile/ingressos', [App\Http\Controllers\ProfileController::class, 'myIngressos'])->name('profile.ingressos');
});