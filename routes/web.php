<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// AuthController
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// StudentController
Route::get('/student/profile', [StudentController::class, 'showProfile'])->name('student.showProfile');
Route::put('/student/profile', [StudentController::class, 'updateProfile'])->name('student.updateProfile');

Route::get('/student/companies', [StudentController::class, 'searchCompanies'])->name('student.searchCompanies');
Route::post('/student/companies', [StudentController::class, 'addCompany'])->name('student.addCompany');

// CompanyController
Route::get('/company/profile', [CompanyController::class, 'showProfile'])->name('company.showProfile');
Route::put('/company/profile', [CompanyController::class, 'updateProfile'])->name('company.updateProfile');

Route::get('/company/positions', [CompanyController::class, 'listPositions'])->name('company.listPositions');
Route::post('/company/positions', [CompanyController::class, 'createPosition'])->name('company.createPosition');

Route::get('/company/applicants', [CompanyController::class, 'listApplicants'])->name('company.listApplicants');
Route::put('/company/applicants/{id}', [CompanyController::class, 'reviewApplicant'])->name('company.reviewApplicant');

// ApplicationController
Route::get('/applications/create', [ApplicationController::class, 'showForm'])->name('application.showForm');
Route::post('/applications', [ApplicationController::class, 'store'])->name('application.store');

Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('application.show');
Route::get('/applications', [ApplicationController::class, 'trackStatus'])->name('application.trackStatus');

// DocumentController
Route::get('/documents', [DocumentController::class, 'index'])->name('document.index');
Route::post('/documents', [DocumentController::class, 'upload'])->name('document.upload');
Route::put('/documents/{id}', [DocumentController::class, 'resubmit'])->name('document.resubmit');

// AdvisorController
Route::get('/advisor/requests', [AdvisorController::class, 'listRequests'])->name('advisor.listRequests');
Route::put('/advisor/requests/{id}/approve', [AdvisorController::class, 'approve'])->name('advisor.approve');
Route::put('/advisor/requests/{id}/reject', [AdvisorController::class, 'reject'])->name('advisor.reject');
Route::get('/advisor/appointments', [AdvisorController::class, 'listAppointments'])->name('advisor.listAppointments');
Route::post('/advisor/appointments', [AdvisorController::class, 'createAppointment'])->name('advisor.createAppointment');

// EvaluationController
Route::get('/evaluations/{applicationId}', [EvaluationController::class, 'show'])->name('evaluation.show');
Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluation.store');

// AdminController
Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.listUsers');
Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
Route::get('/admin/companies', [AdminController::class, 'listCompanies'])->name('admin.listCompanies');
Route::get('/admin/reports', [AdminController::class, 'showReports'])->name('admin.showReports');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
            