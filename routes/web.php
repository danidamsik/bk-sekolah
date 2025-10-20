<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app');
<<<<<<< HEAD
});

Route::get('/dashboard', function () {
    return view('page-content.dashboard');
=======
>>>>>>> 700bc09670598c7c4c3be64c6cbd77fa4fa992e3
});
