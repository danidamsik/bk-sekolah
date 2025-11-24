 <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 transition-all hover:shadow-xl">
     <h3 class="text-xl font-semibold text-gray-700 mb-6 flex items-center gap-2">
         <i class="fas fa-list text-green-500"></i> Detail Kelas: XII IPA 1
     </h3>

     @livewire('master-data.data-kelas.detail-kelas.card-kelas', ['classId' => $id])
     @livewire('master-data.data-kelas.detail-kelas.table-kelas', ['classId' => $id])
 </div>
