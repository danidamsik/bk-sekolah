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
                 @foreach ($dataTeacher as $item)
                     <option value="{{$item->id}}">{{$item->name}}</option>
                 @endforeach
             </select>
             @error('wali_kelas')
                 <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
             @enderror

         </div>
         {{-- Tombol Submit --}}
         <div class="flex justify-end md:col-span-2">
             <button type="submit"
                 class="flex items-center justify-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-xl shadow hover:bg-blue-700 transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed min-w-[110px]"
                 wire:loading.attr="disabled" wire:target="createOrUpdate">
                 {{-- Icon dan text default --}}
                 <span wire:loading.remove wire:target="createOrUpdate">
                     Simpan
                 </span>
                 {{-- Loading state --}}
                 <span wire:loading wire:target="createOrUpdate" class="flex items-center gap-2">
                     <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24">
                         <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                             stroke-width="4"></circle>
                         <path class="opacity-75" fill="currentColor"
                             d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                         </path>
                     </svg>
                 </span>
             </button>
         </div>
         {{-- END: Tombol Tambah --}}
     </form>
     {{-- END: Form Input --}}


 </div>
