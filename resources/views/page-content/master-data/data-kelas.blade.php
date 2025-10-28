@extends('app')

@section('content')
    <div  x-data="{
        dataKelas: { 
        nama_kelas: '', 
        wali_kelas: '', 
        jumlah_siswa: '', 
        }
    }"class="p-6 space-y-8 animate-fadeIn">
        {{-- START COMPONENT: Table Data Kelas --}}
        @livewire('master-data.data-kelas.table-kelas')
        {{-- END COMPONENT --}}

        {{-- START COMPONENT: Form Tambah Kelas --}}
        @livewire('master-data.data-kelas.form-kelas')
        {{-- END COMPONENT --}}

        {{-- START COMPONENT: Detail Kelas --}}
        @livewire('master-data.data-kelas.detail-kelas')
        {{-- END COMPONENT --}}
    </div>

    {{-- START: Animasi CSS --}}
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out;
        }

        .animate-slideUp {
            animation: slideUp 0.5s ease-in-out;
        }
    </style>
    {{-- END: Animasi CSS --}}
@endsection
