<div @edit-user.window = 
            "
                $wire.nama_user = $event.detail.nama_user;
                $wire.email = $event.detail.email;
                $wire.role = $event.detail.role;
                $wire.nama_guru = $event.detail.nama_guru;
                $wire.id = $event.detail.id;
            "
    class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 transition-all duration-500 hover:shadow-2xl backdrop-blur-sm">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fa-solid fa-user-plus text-indigo-600 text-4xl"></i>
        Tambah / Edit User
    </h2>

    <form wire:submit.prevent="createOrUpdate" class="space-y-6">
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm mb-2 font-semibold">Nama</label>
                <input wire:model="nama_user" type="text" placeholder="Masukkan nama"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md">
                @error('nama_user')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-2 font-semibold">Email</label>
                <input wire:model="email" type="email" placeholder="Masukkan email"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-2 font-semibold">Role</label>
                <select wire:model="role"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md">
                    <option value="">Pilih Role</option>
                    <option value="Admin">Admin</option>
                    <option value="WaliKelas">Wali Kelas</option>
                    <option value="GuruBK">Guru BK</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-2 font-semibold">Nama Guru</label>
                <input wire:model="nama_guru" type="text" placeholder="Masukkan nama guru"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md">
                @error('nama_guru')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Tombol Tambah User --}}
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