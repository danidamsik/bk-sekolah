<?php

use App\Livewire\FormLogin;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Livewire\PageContent\Dashboard;
use App\Livewire\PageContent\MasterData\DataGuru;
use App\Livewire\PageContent\MasterData\DataKelas;
use App\Livewire\PageContent\MasterData\DataSiswa;
use App\Livewire\PageContent\MasterData\DetailKelas;
use App\Livewire\PageContent\MasterData\DataPelanggaran;
use App\Livewire\PageContent\PengaturanSistem\ManagementUser;
use App\Livewire\PageContent\ManagementPelanggaran\RekapLaporan;
use App\Livewire\PageContent\ManagementPelanggaran\SesiKonseling;
use App\Livewire\PageContent\ManagementPelanggaran\LaporanPelanggaran;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class);
    Route::get('/master-data/data-guru', DataGuru::class);
    Route::get('/master-data/data-siswa', DataSiswa::class);
    Route::get('/master-data/data-kelas', DataKelas::class);
    Route::get('/master-data/data-pelanggaran', DataPelanggaran::class);
    Route::get('/master-data/data-kelas/detail-kelas/{id}', DetailKelas::class);
    Route::get('/management-pelanggaran/laporan-pelanggaran', LaporanPelanggaran::class);
    Route::get('/management-pelanggaran/sesi-konseling', SesiKonseling::class);
    Route::get('/management-pelanggaran/rekap-laporan', RekapLaporan::class);
    Route::get('/pengaturan-sistem/management-user', ManagementUser::class)->middleware('role:Admin');
    
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/', FormLogin::class);
    Route::get('/login', FormLogin::class);
});