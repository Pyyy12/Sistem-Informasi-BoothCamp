<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BootcampAdminController;
use App\Http\Controllers\Admin\EnrollmentAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/bootcamp', [BootcampController::class, 'index'])->name('bootcamps.index');
Route::get('/bootcamp/{bootcamp:slug}', [BootcampController::class, 'show'])->name('bootcamps.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/bootcamp/{bootcamp}/daftar', [EnrollmentController::class, 'store'])->name('enrollments.store');
    Route::get('/pendaftaran-saya', [EnrollmentController::class, 'mine'])->name('enrollments.mine');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [BootcampAdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('bootcamps', BootcampAdminController::class)->except(['show']);
    Route::get('/enrollments', [EnrollmentAdminController::class, 'index'])->name('enrollments.index');
    Route::patch('/enrollments/{enrollment}', [EnrollmentAdminController::class, 'update'])->name('enrollments.update');
});
