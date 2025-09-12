<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public-dashboard');
});

Route::get('/public-info', function () {
    return view('public-info');
});

Route::get('/public-report', function () {
    return view('public-report');
});

Route::get('/public-unit', function () {
    return view('public-unit');
});

Route::get('/public-detail', function () {
    return view('public-detail');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/info', function () {
    return view('info');
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

Route::get('/user', function () {
    return view('user');
});

