<?php

use Illuminate\Support\Facades\Route;

// แก้ไขบรรทัดนี้ ให้เรียกแสดงหน้า loginmain หรือ welcome โดยตรง
Route::get('/', function () {
    return view('partials.loginmain');
});

Route::get('/login', function () {
    return view('partials.loginmain');
})->name('login');

Route::get('/loginmain', function () {
    return view('partials.loginmain');
})->name('loginmain');

require __DIR__ . '/settings.php';