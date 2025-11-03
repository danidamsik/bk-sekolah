@extends('app')

@section('content')
    <div class="p-6 space-y-8 animate-fadeIn"
        @scroll-to-form.window="
            // ✅ Tangkap event global dan scroll halus ke form
            $refs.formSection.scrollIntoView({ behavior: 'smooth' })
        ">
        {{-- START COMPONENT: Table Data Kelas --}}
        @livewire('master-data.data-kelas.table-kelas')
        {{-- END COMPONENT --}}
        <div x-ref="formSection">
            {{-- START COMPONENT: Form Tambah Kelas --}}
            @livewire('master-data.data-kelas.form-kelas')
            {{-- END COMPONENT --}}
        </div>


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
