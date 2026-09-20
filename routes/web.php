<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public / Landing Routes
Route::get('/', [InternController::class, 'index'])->name('index');
Route::get('/intern', [InternController::class, 'internship'])->name('intern.intern');

// AuthController
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('auth.showLoginAdmin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('auth.loginAdmin');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Authenticated Routes (ต้อง Login ก่อนใช้งาน)
Route::middleware('auth')->group(function () {
    // ProfileController
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.profile');
    
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Auth Admin
Route::middleware('auth')->group(function () {
    // ProfileController
    
});

// Verified Auth Group
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

// Employee Page
Route::get('/employee', function () {
    return view('employee');
})->name('employee');

//train
Route::get('/train', function () {
    return view('train');
})->name('train');

//fulltimejob
Route::get('/Fulltimejob', function () {
    return view('Fulltimejob');
})->name('Fulltimejob');

//parttime
Route::get('/parttime', function () {
    return view('parttime');
})->name('parttime');

//trainee
Route::get('/trainee', function () {
    return view('trainee');
})->name('trainee');



require __DIR__.'/settings.php';
            
