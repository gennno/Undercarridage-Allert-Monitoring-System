<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;
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

Route::get('/unit', [UnitController::class, 'index'])->name('units.index');
Route::get('/unit/{unit}', [UnitController::class, 'show'])->name('units.show');
Route::post('/unit', [UnitController::class, 'store'])->name('units.store');
Route::get('/units/{id}/edit', [UnitController::class, 'edit'])->name('units.edit');
Route::put('/units/{id}', [UnitController::class, 'update'])->name('units.update');

// Route::get('/unit/{unit}/edit', [UnitController::class, 'edit'])->name('units.edit');
Route::delete('/units/{id}', [UnitController::class, 'destroy'])->name('units.destroy');

Route::get('/detail', function () {
    return view('detail');
});

Route::post('/componentstore', [UnitController::class, 'componentstore'])->name('component.store');
Route::delete('/component/{id}', [UnitController::class, 'componentdestroy'])->name('component.destroy');
Route::get('/component/{id}/edit', [UnitController::class, 'componentedit'])->name('component.edit');
Route::put('/component/{id}', [UnitController::class, 'componentupdate'])->name('component.update');



// Route::get('/units/{id}', [UnitController::class, 'show'])->name('units.show');

Route::get('/profile', function () {
    return view('profile');
});