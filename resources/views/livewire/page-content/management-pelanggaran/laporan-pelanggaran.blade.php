<div x-data class="p-6 space-y-8 animate-fade-in"
    @scroll-to-form.window="
            // ✅ Tangkap event global dan scroll halus ke form
            $refs.formSection.scrollIntoView({ behavior: 'smooth' })
        ">

    @livewire('management-pelanggaran.laporan-pelanggaran.table-laporan-pelanggaran')
    <div x-ref="formSection">
        @livewire('management-pelanggaran.laporan-pelanggaran.form-laporan-pelanggaran')
    </div>
</div>

@assets
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
@endassets
