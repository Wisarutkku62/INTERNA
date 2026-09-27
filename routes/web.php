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
Route::view('/mg','company.ManageInternship');
Route::view('/mf','company.InformationandHistory');
// Public
Route::get('/', [InternController::class, 'index'])->name('index');
Route::get('/intern', [InternController::class, 'internship'])->name('intern.intern');
Route::view('/loginmain', 'loginmain')->name('loginmain');
Route::view('/login/admin', 'loginadmin')->name('loginadmin');
Route::view('apt','evaluationstd')->name('evaluationstd');
Route::view('qwe','managecom')->name('managecom');

Route::get('/doc', [DocumentController::class, 'index'])->name('documents.index');
Route::post('/doc', [DocumentController::class, 'store'])->name('documents.store');

// Employee Routes
Route::get('/train', [EmployeeController::class, 'train'])->name('train');
Route::get('/Fulltimejob', [EmployeeController::class, 'fulltime'])->name('Fulltimejob');
Route::get('/parttime', [EmployeeController::class, 'parttime'])->name('parttime');
Route::get('/trainee', [EmployeeController::class, 'trainee'])->name('trainee');

//Login & Register | AuthController 
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


// Authenticated 
Route::middleware(['auth', 'role:student'])->group(function () {
    // ProfileController
    Route::get('/newprofile', [ProfileController::class, 'newProfile'])->name('newprofile');
    Route::put('/profile/save', [ProfileController::class, 'saveProfile'])->name('profile.save');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.profile');
    Route::get('/evaluation', [ProfileController::class, 'evaluation'])->name('evaluation');
    Route::post('/evaluation', [ProfileController::class, 'saveEvaluation'])->name('evaluation.save');
    Route::get('/student/evaluation', [EvaluationController::class, 'index'])->name('student.evaluation');
    
});

Route::middleware(['auth', 'role:company'])->group(function () {
    Route::get('/company/overview', [CompanyController::class, 'overview'])->name('company.overview');
    Route::get('/company/profile/edit', [CompanyController::class, 'editProfile'])->name('company.edit.profile');
    Route::get('/company/job_announcement', [CompanyController::class, 'announcement'])->name('company.announcement');
    Route::post('/company/job_announcement/create', [CompanyController::class, 'announcement_create'])->name('company.announcement.create');
    Route::get('/company/job_announcement/all',[CompanyController::class, 'announcement_all'])->name('company.announcement.all');
    Route::get('/company/job_announcement/all',[CompanyController::class, 'announcement_all'])->name('company.announcement.all');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('auth.showLoginAdmin');
    Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('auth.loginAdmin');
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::view('dashboard', 'dashboard')->name('dashboard');
// });


require __DIR__.'/settings.php';