<div @edit-guru.window="
        $wire.name = $event.detail.name;
        $wire.nip = $event.detail.nip;
        $wire.email = $event.detail.email;
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

        {{-- Email --}}
        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input type="email" id="emailGuru" wire:model="email" placeholder="Masukkan email guru"
                class="w-full border @error('emailGuru') border-red-500 @else border-gray-300 @enderror rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">

            @error('email')
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
                class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-xl shadow hover:bg-blue-700 transition duration-200">
                <i class="fa-solid fa-plus"></i> Tambah Data
            </button>
        </div>
    </form>
</div>
