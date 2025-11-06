<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Protected Routes (Hanya bisa diakses setelah login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('page-content.dashboard');
    })->name('dashboard');

    // Master Data
    Route::get('/master-data/data-guru', function () {
        return view('page-content.master-data.data-guru');
    });

    Route::get('/master-data/data-siswa', function () {
        return view('page-content.master-data.data-siswa');
    });

    Route::get('/master-data/data-kelas', function () {
        return view('page-content.master-data.data-kelas');
    });

    Route::get('/master-data/data-pelanggaran', function () {
        return view('page-content.master-data.data-pelanggaran');
    });

    // Management Pelanggaran
    Route::get('/management-pelanggaran/laporan-pelanggaran', function () {
        return view('page-content.management-pelanggaran.laporan-pelanggaran');
    });

    Route::get('/management-pelanggaran/sesi-konseling', function () {
        return view('page-content.management-pelanggaran.sesi-konseling');
    });

    Route::get('/management-pelanggaran/rekap-laporan', function () {
        return view('page-content.management-pelanggaran.rekap-laporan');
    });

    // Pengaturan Sistem
    Route::get('/pengaturan-sistem/management-user', function () {
        return view('page-content.pengaturan-sistem.management-user');
    });

    // Detail kelas dengan parameter ID
    Route::get('/master-data/data-kelas/detail-kelas/{id}', function ($id) {
        return view('page-content.master-data.detail-kelas', compact('id'));
    })->name('kelas.detail');

    // Export PDF
    Route::get('/export/recap-per-class-pdf', [ExportController::class, 'exportRecapPerClassPDF'])
        ->name('export.recap.class.pdf');

    Route::get('/export/recap-per-student-pdf', [ExportController::class, 'exportRecapPerStudentPDF'])
        ->name('export.recap.student.pdf');

    Route::get('/pengaturan-sitem/management-user', function () {
        return view('page-content.pengaturan-sistem.management-user');
    });

    // Logout (pakai GET, sesuai permintaan kamu)
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

/*
|--------------------------------------------------------------------------
| Guest Routes (Hanya untuk user belum login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');

    Route::get('/login', function () {
        return view('login');
    });
});
