@extends('app')

@section('content')
    <div x-data="{
        laporanPelanggaran: { 
        nama_siswa: '', 
        class_name: '', 
        nama_pelanggaran: '', 
        nama_teacher: '', 
        date: '', 
        status: '', 
        }
    }" class="p-6 space-y-8 animate-fade-in">

        {{-- ======================================================
        COMPONENT 1 : FILTER + TABEL DATA LAPORAN PELANGGARAN
        Berisi filter (kelas, status, tanggal) dan tabel laporan
    ====================================================== --}}
        @livewire('management-pelanggaran.laporan-pelanggaran.table-laporan-pelanggaran')
        {{-- ======================================================
        COMPONENT 2 : FORM INPUT LAPORAN PELANGGARAN
        Berisi form tambah laporan baru + tombol submit
    ====================================================== --}}
        @livewire('management-pelanggaran.laporan-pelanggaran.form-laporan-pelanggaran')
    </div>

    {{-- Animasi sederhana --}}
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.4s ease-out;
        }
    </style>
@endsection
