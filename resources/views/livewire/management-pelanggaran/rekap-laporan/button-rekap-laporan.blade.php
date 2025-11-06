 <div
     class="flex flex-wrap justify-between items-center gap-3 bg-white p-4 rounded-xl shadow-lg border border-gray-100 transition-transform duration-300 hover:scale-[1.02]">
     <h2 class="text-2xl font-bold text-gray-700 flex items-center gap-2">
         <i class="fas fa-chart-bar text-indigo-500"></i>
         Rekap & Laporan Pelanggaran
     </h2>

     <div class="flex flex-wrap gap-2">
         <a href="{{ route('export.recap.class.pdf') }}" wire:navigate.external target="_blank">
             <button
                 class="flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:scale-105">
                 <i class="fas fa-file-pdf"></i> Ekspor PDF
             </button>
         </a>

         <button wire:click="downloadExcel"
             class="flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:scale-105">
             <i class="fas fa-file-excel"></i> Ekspor Excel
         </button>
         <button
             class="flex items-center gap-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:scale-105">
             <i class="fas fa-print"></i> Cetak Surat Panggilan
         </button>
     </div>
 </div>
