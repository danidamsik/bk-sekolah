<div @edit-siswa.window="
        $wire.nisn = $event.detail.nisn;
        $wire.name = $event.detail.name;
        $wire.nama_kelas = $event.detail.nama_kelas;
        $wire.wali_kelas = $event.detail.wali_kelas;
        $wire.parent_name = $event.detail.parent_name;
        $wire.parent_contact = $event.detail.parent_contact;
        $wire.id = $event.detail.id;
        "
    class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 animate-slideUp">
    <h3 class="text-xl font-semibold text-gray-700 flex items-center gap-2 mb-4">
        <i class="fas fa-user-plus text-blue-600"></i> Tambah Data Siswa
    </h3>

    <form wire:submit.prevent="createOrUpdate" class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-gray-600">NISN</label>
            <input wire:model="nisn" type="text" placeholder="Masukkan NISN"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">

            @error('nisn')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="text-sm text-gray-600">Nama Siswa</label>
            <input wire:model="name" type="text" placeholder="Masukkan Nama Siswa"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">

            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="text-sm text-gray-600">Kelas</label>
            <select wire:model="nama_kelas"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="">Pilih Kelas</option>
                @foreach ($dataKelas as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>

            @error('nama_kelas')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="text-sm text-gray-600">Wali Kelas</label>
            <select wire:model="wali_kelas"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="">Pilih Wali Kelas</option>
                @foreach ($dataKelas as $data)
                    <option value="{{ $data->teacher_id }}">{{ $data->teacher->name }}</option>
                @endforeach
            </select>

            @error('wali_kelas')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="text-sm text-gray-600">Orang Tua</label>
            <input wire:model="parent_name" type="text" placeholder="Masukkan Nama Orang Tua"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">

            @error('parent_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="text-sm text-gray-600">Kontak Orang Tua</label>
            <input wire:model="parent_contact" type="text" placeholder="Masukkan Nomor HP Orang Tua"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">

            @error('parent_contact')
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
