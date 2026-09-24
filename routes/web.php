<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth;

Route::view('/com', 'managecom')->name('managecom');
// Public / Landing Routes
Route::get('/', [InternController::class, 'index'])->name('index');
Route::get('/intern', [InternController::class, 'internship'])->name('intern.intern');
Route::view('/loginmain', 'loginmain')->name('loginmain');
Route::view('/login/admin', 'loginadmin')->name('loginadmin');
Route::view('apt','evaluationstd')->name('evaluationstd');
Route::view('qwe','managecom')->name('managecom');
Route::view('doc','document')->name('document');
// Employee Routes
Route::get('/train', [EmployeeController::class, 'train'])->name('train');
Route::get('/Fulltimejob', [EmployeeController::class, 'fulltime'])->name('Fulltimejob');
Route::get('/parttime', [EmployeeController::class, 'parttime'])->name('parttime');
Route::get('/trainee', [EmployeeController::class, 'trainee'])->name('trainee');

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
    Route::get('/newprofile', [ProfileController::class, 'newProfile'])->name('newprofile');
    Route::post('/profile', [ProfileController::class, 'saveProfile'])->name('profile.save');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.profile');
    Route::get('/evaluation', [ProfileController::class, 'evaluation'])->name('evaluation');
    Route::post('/evaluation', [ProfileController::class, 'saveEvaluation'])->name('evaluation.save');

    // AdminController
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::delete('/admin/companies/{id}', [AdminController::class, 'destroyCompany'])->name('admin.companies.destroy');
});

// Verified Auth Group
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});


require __DIR__.'/settings.php';