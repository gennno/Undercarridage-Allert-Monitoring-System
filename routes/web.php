<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'indexpublic'])->name('public-dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/{category}', [DashboardController::class, 'showCategory'])->name('dashboard.category');
Route::get('/public-dashboard/{category}', [DashboardController::class, 'publicshowCategory'])->name('public-dashboard.category');


Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/user', [UserController::class, 'index'])->name('users.index');

// Simpan user baru
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Halaman edit user
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// Update user
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Hapus user
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/public-report', function () {
    return view('public-report');
});

Route::get('/public-unit', function () {
    return view('public-unit');
});

Route::get('/public-detail', function () {
    return view('public-detail');
});

Route::get('/report', function () {
    return view('report');
});

Route::get('/unit', function () {
    return view('unit');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/profile', function () {
    return view('profile');
});



