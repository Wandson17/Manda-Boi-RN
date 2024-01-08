<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('welcome');

Route::get('/about', fn() => view('about'))->name('about');

Route::get('/dashboard', function () {
    if(Auth::user()->is_admin)
        return redirect()->route('admin.dashboard');
    return view('profile.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/corrida.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/festa.php';
require __DIR__ . '/ingresso.php';
require __DIR__ . '/senha.php';
require __DIR__ . '/profile.php';