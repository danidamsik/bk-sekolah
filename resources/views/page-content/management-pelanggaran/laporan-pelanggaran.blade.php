@extends('app')

@section('content')
    <div class="p-6 space-y-8 animate-fade-in">

        @livewire('management-pelanggaran.laporan-pelanggaran.table-laporan-pelanggaran')
        {{-- ======================================================
        COMPONENT 2 : FORM INPUT LAPORAN PELANGGARAN
        Berisi form tambah laporan baru + tombol submit
    ====================================================== --}}
        @livewire('management-pelanggaran.laporan-pelanggaran.form-laporan-pelanggaran')
    </div>

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
