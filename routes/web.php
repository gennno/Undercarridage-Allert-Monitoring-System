<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/detail_kategori', function () {
    return view('detail_kategori');
});
Route::get('/report', function () {
    return view('report');
});
