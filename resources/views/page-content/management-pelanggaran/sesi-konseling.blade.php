@extends('app')

@section('content')
    <div x-data="{
        dataKonseling: { 
        nama_siswa: '', 
        nama_guru: '', 
        session_date: '', 
        status: '',
        }
    }" class="p-6 space-y-8 animate-fade-in">

        {{-- ======================================================
        COMPONENT 1 : FILTER + TABEL SESI KONSELING
        Berisi filter berdasarkan status + tabel data sesi
    ====================================================== --}}
        @livewire('management-pelanggaran.sesi-konseling.table-sesi-konseling')
        {{-- END COMPONENT 1 --}}

        {{-- ======================================================
        COMPONENT 2 : FORM TAMBAH CATATAN KONSELING
        Berisi form input rekomendasi & tindak lanjut
    ====================================================== --}}
        @livewire('management-pelanggaran.sesi-konseling.form-sesi-konseling')
        {{-- END COMPONENT 2 --}}

        {{-- ======================================================
        COMPONENT 3 : JADWAL KONSELING TERDEKAT
        Menampilkan daftar sesi yang akan datang
    ====================================================== --}}
        @livewire('management-pelanggaran.sesi-konseling.jadwal-sesi-konseling')
        {{-- END COMPONENT 3 --}}
    </div>

    {{-- Animasi Halus --}}
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
