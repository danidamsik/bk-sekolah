<div class="p-8 space-y-8 animate-fadeIn">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Dashboard</h1>
            <p class="text-gray-500 text-sm">Ringkasan aktivitas & data pelanggaran siswa</p>
        </div>
        <button wire:click="$refresh" type="button"
            class="bg-indigo-600 text-white px-4 py-2 rounded-xl shadow hover:bg-indigo-700 transition">
            <i class="fas fa-sync-alt mr-2"></i> Refresh Data
        </button>
    </div>

    {{-- Card --}}
    @auth
        @if (auth()->user()->isWaliKelas())
            @livewire('master-data.data-kelas.detail-kelas.card-kelas', ['classId' => $id])
            @livewire('master-data.data-kelas.detail-kelas.table-kelas', ['classId' => $id])
        @else
            @livewire('dashboard.top-card')
            <!-- Charts -->
            @livewire('dashboard.chart')
            <!-- Top 10 Siswa -->
            @livewire('dashboard.top-siswa')
            <!-- Top 10 Kelas -->
            @livewire('dashboard.top-kelas')
        @endif
    @endauth
</div>

@assets
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

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out;
        }
    </style>
@endassets

@script
    <script>
        document.getElementById("refreshBtn")?.addEventListener("click", () => {
            location.reload();
        });
    </script>
@endscript
