<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class , 'index'])->name('home');
Route::get('/login' ,[Controller::class , 'login'])->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
