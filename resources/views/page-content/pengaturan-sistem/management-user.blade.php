@extends('app')

@section('content')
    <div x-data
        @scroll-to-form.window="
            // ✅ Tangkap event global dan scroll halus ke form
            $refs.formSection.scrollIntoView({ behavior: 'smooth' })
        "
        class="p-6 space-y-8 animate-fade-in bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        {{-- ========================= Start Component 1 : Table User ========================= --}}
        @livewire('pengaturan-sistem.management-user.table-management-user')
        {{-- ========================= End Component 1 : Table User ========================= --}}

        <div x-ref="formSection">
            {{-- ========================= Start Component 2 : Form Tambah/Edit User ========================= --}}
            @livewire('pengaturan-sistem.management-user.form-management-user')
            {{-- ========================= End Component 2 : Form Tambah/Edit User ========================= --}}
        </div>

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
