<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-2 gap-4">
        <h2 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="fas fa-user-graduate text-blue-500"></i> Data Siswa
        </h2>
        <div class="flex gap-3">
            <input type="text" wire:model.live="search" placeholder="Cari berdasarkan NISN / Nama..."
                class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none w-72" />
            <button wire:click="searchSiswa"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">NISN</th>
                    <th class="py-3 px-4 text-left">Nama</th>
                    <th class="py-3 px-4 text-left">Kelas</th>
                    <th class="py-3 px-4 text-left">Wali Kelas</th>
                    <th class="py-3 px-4 text-left">Total Point</th>
                    <th class="py-3 px-4 text-left">Orang Tua</th>
                    <th class="py-3 px-4 text-left">Kontak</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($dataSiswa as $index => $siswa)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4">{{ $siswa->nisn }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $siswa->name }}</td>
                        <td class="py-3 px-4">{{ $siswa->nama_kelas }}</td>
                        <td class="py-3 px-4">{{ $siswa->wali_kelas }}</td>
                        <td class="py-3 px-4 text-blue-600 font-semibold">{{ $siswa->total_point }}</td>
                        <td class="py-3 px-4">{{ $siswa->parent_name }}</td>
                        <td class="py-3 px-4">{{ $siswa->parent_contact }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center gap-3 text-gray-600"> <button
                                    @click="dataSiswa = {
                                        nisn : '{{$siswa['nisn']}}',
                                        name : '{{$siswa['name']}}',
                                        nama_kelas : '{{$siswa['nama_kelas']}}',
                                        wali_kelas : '{{$siswa['wali_kelas']}}',
                                        total_point : '{{$siswa['total_point']}}',
                                        parent_name : '{{$siswa['parent_name']}}',
                                        parent_contact : '{{$siswa['parent_contact']}}',
                                    }"
                                    class="hover:text-blue-600 transition" title="Edit"> <i class="fas fa-edit"></i>
                                </button> <button class="hover:text-red-600 transition" title="Hapus"
                                    > <i class="fas fa-trash"></i> </button> <button
                                    class="hover:text-green-600 transition" title="Lihat Detail"> <i
                                        class="fas fa-eye"></i> </button> </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="py-4 text-center text-gray-500">Tidak ada data siswa</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
