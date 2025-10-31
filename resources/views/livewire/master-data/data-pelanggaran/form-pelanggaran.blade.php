<div @edit-pelanggaran.window="
        $wire.id = $event.detail.id;
        $wire.name = $event.detail.name;
        $wire.point = $event.detail.point;
        $wire.description = $event.detail.description;
        "
    class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 space-y-4 animate-slideUp">
    <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
        <i class="fa-solid fa-plus text-blue-600"></i> Form Tambah Pelanggaran
    </h2>

    <form wire:submit.prevent="createOrUpdate" id="formPelanggaran" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-gray-600">Nama Pelanggaran</label>
            <input wire:model="name" type="text" id="namaPelanggaran" placeholder="Masukkan nama pelanggaran"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" />
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="text-sm text-gray-600">Poin</label>
            <input wire:model="point" type="number" id="poinPelanggaran" placeholder="Masukkan poin pelanggaran"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" />
            @error('point')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="md:col-span-2">
            <label class="text-sm text-gray-600">Deskripsi</label>
            <textarea wire:model="description" id="deskripsiPelanggaran" placeholder="Masukkan deskripsi pelanggaran"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none"
                rows="3"></textarea>
            @error('description')
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
