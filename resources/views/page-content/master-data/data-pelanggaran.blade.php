@extends('app')

@section('content')
    <div x-data class="p-8 bg-gray-50 min-h-screen space-y-8 animate-fadeIn"
        @scroll-to-form.window="
            // ✅ Tangkap event global dan scroll halus ke form
            $refs.formSection.scrollIntoView({ behavior: 'smooth' })
        ">
        <!-- START COMPONENT DATA PELANGGARAN -->
        @livewire('master-data.data-pelanggaran.table-pelanggaran')
        <!-- END COMPONENT DATA PELANGGARAN -->

        <div x-ref="formSection">
            <!-- START COMPONENT FORM INPUT -->
            @livewire('master-data.data-pelanggaran.form-pelanggaran')
            <!-- END COMPONENT FORM INPUT -->
        </div>

    </div>
    <!-- ANIMASI -->
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
