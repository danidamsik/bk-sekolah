@extends('app')

@section('content')
    <div x-data="{
        dataSiswa: { 
        nisn:'',
        name: '', 
        nama_kelas: '', 
        wali_kelas: '', 
        total_point: '', 
        parent_name: '', 
        parent_contact: '', 
        }
    }" class="p-6 space-y-8 animate-fadeIn">

        <!-- 🔹 COMPONENT 1: Input Pencarian + Table Data Siswa -->
        @livewire('master-data.data-siswa.table-siswa')
        <!-- END COMPONENT 1 -->



        <!-- 🔹 COMPONENT 2: Form Tambah Data Siswa -->
        @livewire('master-data.data-siswa.form-siswa')
        <!-- END COMPONENT 2 -->

    </div>

    <!-- 🔹 Animasi -->
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
@endsection
