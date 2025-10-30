 <div @edit-kelas.window="
        $wire.id = $event.detail.id;
        $wire.nama_kelas = $event.detail.nama_kelas;
        $wire.wali_kelas = $event.detail.wali_kelas;
        $wire.jumlah_siswa = $event.detail.jumlah_siswa;
        "
     class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 animate-slideUp">

     {{-- START: Header Form --}}
     <h3 class="text-xl font-semibold text-gray-700 mb-6 flex items-center gap-2">
         <i class="fas fa-plus-circle text-blue-600"></i> Tambah Data Kelas
     </h3>
     {{-- END: Header Form --}}

     {{-- START: Form Input --}}
     <form wire:submit.prevent="createOrUpdate" class="grid grid-cols-1 md:grid-cols-2 gap-6">

         {{-- Input Nama Kelas --}}
         <div>
             <label class="block text-gray-600 text-sm mb-1">Nama Kelas</label>
             <input wire:model="nama_kelas" type="text" placeholder="Masukkan nama kelas"
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none" />

             @error('nama_kelas')
                 <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
             @enderror
         </div>

         {{-- Select Wali Kelas --}}
         <div>
             <label class="block text-gray-600 text-sm mb-1">Wali Kelas</label>
             <select wire:model="wali_kelas"
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                 <option value="">Pilih Wali Kelas</option>
                 <option value="Siti Nurhaliza, S.Pd">Siti Nurhaliza, S.Pd</option>
                 <option value="Bu Rini">Bu Rini</option>
                 <option value="Pak Agus">Pak Agus</option>
                 <option value="Bu Sinta">Bu Sinta</option>
             </select>
             @error('wali_kelas')
                 <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
             @enderror

         </div>

         {{-- Input Jumlah Siswa --}}
         <div>
             <label class="block text-gray-600 text-sm mb-1">Jumlah Siswa</label>
             <input wire:model="jumlah_siswa" type="number" placeholder="Masukkan jumlah siswa"
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none" />
             @error('jumlah_siswa')
                 <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
             @enderror
         </div>
         {{-- START: Tombol Tambah --}}
         <div class="flex justify-end mt-6">
             <button
                 class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition">
                 <i class="fas fa-plus"></i> Tambah Data
             </button>
         </div>
         {{-- END: Tombol Tambah --}}
     </form>
     {{-- END: Form Input --}}


 </div>
