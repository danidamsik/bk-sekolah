<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/dashboard', function () {
    return view('page-content.dashboard');
});

Route::get('/note', function () {
    return view('page-content.note');
});




