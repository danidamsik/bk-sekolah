<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;

Route::get('/dashboard', function () {
    return view('page-content.dashboard');
});

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

Route::get('/management-pelanggaran/laporan-pelanggaran', function () {
    return view('page-content.management-pelanggaran.laporan-pelanggaran');
});

Route::get('/management-pelanggaran/sesi-konseling', function () {
    return view('page-content.management-pelanggaran.sesi-konseling');
});

Route::get('/management-pelanggaran/rekap-laporan', function () {
    return view('page-content.management-pelanggaran.rekap-laporan');
});

Route::get('/pengaturan-sitem/management-user', function () {
    return view('page-content.pengaturan-sistem.management-user');
});

Route::get('/master-data/data-kelas/detail-kelas/{id}', function ($id) {
    return view('page-content.master-data.detail-kelas', compact('id'));
});

Route::get('/export/recap-per-class-pdf', [ExportController::class, 'exportRecapPerClassPDF'])
    ->name('export.recap.class.pdf');

Route::get('/export/recap-per-student-pdf', [ExportController::class, 'exportRecapPerStudentPDF'])
    ->name('export.recap.student.pdf');



