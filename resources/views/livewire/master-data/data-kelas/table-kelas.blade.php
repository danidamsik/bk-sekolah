<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-2 gap-4">
        <h2 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="fas fa-chalkboard-teacher text-blue-500"></i> Data Kelas
        </h2>
        <div class="flex gap-3">
            <input wire:model.live="search" type="text" id="searchInput"
                placeholder="Cari berdasarkan nama kelas / wali..."
                class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none w-72" />
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-center w-12">No</th>
                    <th class="py-3 px-4 text-left">Nama Kelas</th>
                    <th class="py-3 px-4 text-left">Wali Kelas</th>
                    <th class="py-3 px-4 text-center">Jumlah Siswa</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="kelasTable" class="divide-y divide-gray-100">
                @forelse ($dataKelas as $i => $kelas)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 text-center">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800 text-left">
                            {{ $kelas['nama_kelas'] ?? ($kelas->nama_kelas ?? '-') }}
                        </td>
                        <td class="py-3 px-4 text-left">
                            {{ $kelas['wali_kelas'] ?? ($kelas->wali_kelas ?? '-') }}
                        </td>
                        <td class="py-3 px-4 text-center">
                            {{ $kelas['jumlah_siswa'] ?? ($kelas->jumlah_siswa ?? 0) }}
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center gap-3 text-gray-600">
                                <button
                                    class="hover:text-blue-600 transition" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="hover:text-red-600 transition" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button wire:click="lihatDetail({{ $kelas['id'] ?? ($kelas->id ?? 'null') }})"
                                    class="hover:text-green-600 transition" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-500">Tidak ada data kelas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $dataKelas->links('vendor.pagination.custom-white') }}
    </div>

</div>
