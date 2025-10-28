@extends('app')

@section('content')
    <div x-data="{
        dataGuru: { 
        name: '', 
        nip: '', 
        email: '', 
        role: '', 
        phone: '', 
        }
    }" class="p-8 bg-gray-50 min-h-screen space-y-8 animate-fadeIn">

        <!-- === COMPONENT DATA GURU (input, filter, table) === -->
        @livewire('master-data.data-guru.table-guru')
        <!-- === END COMPONENT DATA GURU === -->


        <!-- === FORM TAMBAH DATA === -->
        @livewire('master-data.data-guru.form-guru')
    </div>

    <!-- Animasi -->
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
