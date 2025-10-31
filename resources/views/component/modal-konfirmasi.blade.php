 <!-- Modal Konfirmasi Hapus -->
 <div x-show="showDeleteModal" x-cloak x-transition.opacity
     class="fixed inset-0 flex -top-16 items-center justify-center bg-black bg-opacity-50 z-50">

     <div @click.away="showDeleteModal = false"
         class="bg-white rounded-2xl shadow-lg w-96 p-6 text-center space-y-4 animate-slideUp">

         <i class="fa-solid fa-triangle-exclamation text-red-500 text-4xl"></i>
         <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Hapus</h2>
         <p class="text-gray-600 text-sm">Apakah kamu yakin ingin menghapus data guru ini?</p>

         <div class="flex justify-center gap-3 mt-4">
             <button @click="showDeleteModal = false"
                 class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-xl text-gray-700 font-medium transition">
                 Batal
             </button>

             <button @click="$wire.delete(id); showDeleteModal = false"
                 class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded-xl text-white font-medium transition">
                 Hapus
             </button>
         </div>
     </div>
 </div>
