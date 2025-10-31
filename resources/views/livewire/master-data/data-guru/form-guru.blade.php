<div @edit-guru.window="
        $wire.name = $event.detail.name;
        $wire.nip = $event.detail.nip;
        $wire.phone = $event.detail.phone;
        $wire.Id = $event.detail.id;"
    class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 space-y-4 animate-slideUp">
    <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
        <i class="fa-solid fa-user-plus text-blue-600"></i> Form Tambah/Update Data Guru
    </h2>
    <form wire:submit.prevent="createOrUpdate" id="formGuru" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- Nama Guru --}}
        <div>
            <label class="text-sm text-gray-600">Nama Guru</label>
            <input type="text" id="namaGuru" wire:model="name" placeholder="Masukkan nama guru"
                class="w-full border @error('namaGuru') border-red-500 @else border-gray-300 @enderror rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
            {{-- Pesan error --}}
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- NIP --}}
        <div>
            <label class="text-sm text-gray-600">NIP</label>
            <input type="text" id="nipGuru" wire:model="nip" placeholder="Masukkan NIP"
                class="w-full border @error('nip') border-red-500 @else border-gray-300 @enderror rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
            @error('nip')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- No HP --}}
        <div>
            <label class="text-sm text-gray-600">No HP</label>
            <input type="text" id="noHpGuru" wire:model="phone" placeholder="Masukkan nomor HP"
                class="w-full border @error('noHpGuru') border-red-500 @else border-gray-300 @enderror rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
            @error('phone')
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
    </form>
</div>
