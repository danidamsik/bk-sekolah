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
                <input wire:model="class_name" type="text" name="kelas"
                    class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                    placeholder="Masukkan kelas">
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
                <input wire:model="name_teacher" type="text" name="guru_pelapor"
                    class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                    placeholder="Masukkan nama guru pelapor">
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

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 flex items-center gap-2 transition-all duration-300 shadow-md hover:shadow-xl">
                <i class="fas fa-plus-circle"></i> Tambah Laporan
            </button>
        </div>
    </form>
</div>
