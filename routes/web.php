<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
Route::view('dashboard', 'dashboard')->name('dashboard');

});

// Login: Routes 
Route::get('/login' ,[Controller::class , 'login'])->name('login');
Route::get('/register' ,[Controller::class , 'register'])->name('register');

Route::
require __DIR__.'/settings.php';
