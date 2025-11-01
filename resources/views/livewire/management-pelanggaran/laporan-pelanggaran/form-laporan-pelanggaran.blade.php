<div @laporan-pelanggaran.window="
        $wire.nama_siswa = $event.detail.nama_siswa;
        $wire.class_name = $event.detail.class_name;
        $wire.name_pelanggaran = $event.detail.name_pelanggaran;
        $wire.name_teacher = $event.detail.name_teacher;
        $wire.date = $event.detail.date;
        $wire.status = $event.detail.status;
        $wire.Id = $event.detail.id;"
    class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-700 flex items-center gap-2">
            <i class="fas fa-clipboard-list text-blue-600"></i>
            Tambah Laporan Pelanggaran
        </h2>
    </div>

    @livewire('management-pelanggaran.laporan-pelanggaran.input-box')


    <form wire:submit.prevent="createOrUpdate" class="space-y-5">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Siswa</label>
                <input wire:model="nama_siswa" type="text" name="nama_siswa"
                    class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                    placeholder="Masukkan nama siswa">
                @error('nama_siswa')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Kelas</label>
                <select wire:model="class_name" name="status"
                    class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                    <option value="">pilih kelas</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('class_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Jenis Pelanggaran</label>
                <input wire:model="name_pelanggaran" type="text" name="jenis_pelanggaran"
                    class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                    placeholder="Contoh: Tidak memakai seragam">
                @error('name_pelanggaran')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Guru Pelapor</label>
                <select wire:model="name_teacher" name="status"
                    class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                    <option value="">Guru Pelapor</option>
                    @foreach ($guru as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('name_teacher')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Tanggal</label>
                <input wire:model="date" type="date" name="tanggal"
                    class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Status</label>
                <select wire:model="status" name="status"
                    class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                    <option value="Baru">Baru</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Konseling">Konseling</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

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
