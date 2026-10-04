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


// Public
Route::get('/', [InternController::class, 'index'])->name('index');
Route::get('/intern', [InternController::class, 'internship'])->name('intern.intern');
Route::get('/intern/detail/{id}', [InternController::class, 'internship_detail'])->name('intern.detail');
Route::post('/intern/detail/{id}', [InternController::class, 'apply'])->name('intern.apply');
Route::view('/contact', 'contactus')->name('contact');


Route::get('/doc', [DocumentController::class, 'index'])->name('documents.index');
Route::post('/doc', [DocumentController::class, 'store'])->name('documents.store');

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
Route::get('/company/profile', [CompanyController::class, 'profile'])->name('company.profile');
Route::get('/company/edit_profile', [CompanyController::class, 'editProfile'])->name('company.edit.profile');
Route::put('/company/edit_profile/edit', [CompanyController::class, 'editProfileSave'])->name('company.edit.profile.save');
Route::get('/company/job_announcement', [CompanyController::class, 'announcement'])->name('company.announcement');
Route::post('/company/job_announcement/create', [CompanyController::class, 'announcement_create'])->name('company.announcement.create');
Route::get('/company/job_announcement/all',[CompanyController::class, 'announcement_all'])->name('company.announcement.all');
Route::get('/company/job_announcement/edit/{id}',[CompanyController::class, 'announcement_edit'])->name('company.announcement.edit');
Route::put('/company/job_announcement/edit/{id}/update',[CompanyController::class, 'announcement_update'])->name('company.announcement.update');
Route::delete('/company/job_announcement/delete/{id}', [CompanyController::class, 'delete'])->name('company.announcement.delete');
Route::get('/company/applicant/{id}',[CompanyController::class, 'applicants_profile'])->name('company.applicants.profile');
Route::get('/company/history',[CompanyController::class, 'history'])->name('company.history');
Route::get('interview/create/{id}', [CompanyController::class, 'createInterview'])->name('interviews.create');
Route::post('/interviews/store/{id}', [CompanyController::class, 'storeInterview'])->name('interviews.store');
Route::get('/student/information/{id}', [CompanyController::class, 'studentInformation'])->name('student.information');
Route::get('/company/viewresume/{id}', [CompanyController::class, 'viewresume'])->name('company.viewresume');
Route::put('/company/viewresume/{id}/update', [CompanyController::class, 'updateDocumentStatus'])->name('document.updateStatus');
Route::get('/company/interviewresult/{id}', [CompanyController::class, 'interview_evaluation'])->name('company.interview_evaluation');
Route::put('/company/interviewresult/{id}/update', [CompanyController::class, 'interview_evaluation_update'])->name('company.interview_evaluation_update');
Route::get('/company/applicants', [CompanyController::class, 'applicants_all'])->name('company.applicants.all');
});

// Admin Login
Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('auth.showLoginAdmin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('auth.loginAdmin');

// Admin Protected Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
Route::delete('/admin/companies/{id}', [AdminController::class, 'destroyCompany'])->name('admin.companies.destroy');
Route::delete('/admin/documents/{id}', [AdminController::class, 'destroyDocument'])->name('admin.documents.destroy');
});

require __DIR__.'/settings.php';