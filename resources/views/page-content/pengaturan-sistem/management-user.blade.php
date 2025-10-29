@extends('app')

@section('content')
    <div x-data="{
        user: {
            nama_user: '',
            email: '',
            role: '',
            nama_guru: '',
        }
    }"
        class="p-6 space-y-8 animate-fade-in bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        {{-- ========================= Start Component 1 : Table User ========================= --}}
        @livewire('pengaturan-sistem.management-user.table-management-user')
        {{-- ========================= End Component 1 : Table User ========================= --}}

        {{-- ========================= Start Component 2 : Form Tambah/Edit User ========================= --}}
        @livewire('pengaturan-sistem.management-user.form-management-user')
        {{-- ========================= End Component 2 : Form Tambah/Edit User ========================= --}}

    </div>

    {{-- Animation style --}}
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
    </style>
@endsection
