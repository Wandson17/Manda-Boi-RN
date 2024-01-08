<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))
        ->name('admin.dashboard'); 
});