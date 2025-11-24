<div class="flex flex-wrap justify-between items-center gap-3 bg-white p-4 rounded-xl shadow-lg border border-gray-100 transition-transform duration-300 hover:scale-[1.02]"
    x-data="{ openPdf: false, openExcel: false }">

    <h2 class="text-2xl font-bold text-gray-700 flex items-center gap-2">
        <i class="fas fa-chart-bar text-indigo-500"></i>
        Rekap & Laporan Pelanggaran
    </h2>

    <div class="flex flex-wrap gap-2">
        <!-- 🔴 Ekspor PDF -->
        <div class="relative">
            <button @click.prevent="openPdf = !openPdf"
                class="flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 relative">
                <span wire:loading.remove wire:target="downloadPdfKelas,downloadPdfSiswa" class="flex items-center gap-2">
                    <i class="fas fa-file-pdf"></i> Ekspor PDF
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </span>
                <!-- Loading Indicator PDF -->
                <span wire:loading wire:target="downloadPdfKelas,downloadPdfSiswa" class="flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Memproses...
                </span>
            </button>

            <!-- 🔽 Dropdown PDF -->
            <div x-show="openPdf" x-transition @click.outside="openPdf = false"
                class="absolute left-0 top-full mt-2 w-60 bg-white border border-gray-200 rounded-2xl shadow-xl z-50 overflow-hidden">
                <div class="p-2">
                    <button wire:click="downloadPdfKelas; openPdf = false"
                        class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200">
                        <i class="fa-solid fa-school"></i>
                        <span>Pelanggaran per Kelas</span>
                    </button>
                    <button wire:click="downloadPdfSiswa; openPdf = false"
                        class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200">
                        <i class="fa-solid fa-user-graduate"></i>
                        <span>Pelanggaran per Siswa</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- 🟢 Ekspor Excel -->
        <div class="relative">
            <button @click.prevent="openExcel = !openExcel"
                class="flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 relative">
                <span wire:loading.remove wire:target="downloadExcelKelas,downloadExcelSiswa"
                    class="flex items-center gap-2">
                    <i class="fas fa-file-excel"></i> Ekspor Excel
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </span>
                <!-- Loading Indicator Excel -->
                <span wire:loading wire:target="downloadExcelKelas,downloadExcelSiswa" class="flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Memproses...
                </span>
            </button>

            <!-- 🔽 Dropdown Excel -->
            <div x-show="openExcel" x-transition @click.outside="openExcel = false"
                class="absolute left-0 top-full mt-2 w-60 bg-white border border-gray-200 rounded-2xl shadow-xl z-50 overflow-hidden">
                <div class="p-2">
                    <button wire:click="downloadExcelKelas; openExcel = false"
                        class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-200">
                        <i class="fa-solid fa-school"></i>
                        <span>Pelanggaran per Kelas</span>
                    </button>
                    <button wire:click="downloadExcelSiswa; openExcel = false"
                        class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-200">
                        <i class="fa-solid fa-user-graduate"></i>
                        <span>Pelanggaran per Siswa</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- 🔵 Cetak Surat -->
        <button
            class="flex items-center gap-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-print"></i> Cetak Surat Panggilan
        </button>
    </div>
</div>
