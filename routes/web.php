<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/dashboard', function () {
    return view('page-content.dashboard');
});

Route::get('/pelanggaran', function () {
    return view('page-content.pelanggaran');
});

Route::get('/management', function () {
    return view('page-content.management-siswa');
});

Route::get('/konseling', function () {
    return view('page-content.konseling');
});

Route::get('/manage-user', function () {
    return view('page-content.manage-user');
});

Route::get('/settings', function () {
    return view('page-content.settings');
});




