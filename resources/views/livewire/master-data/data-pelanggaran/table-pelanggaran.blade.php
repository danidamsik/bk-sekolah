<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-2 gap-4">
        <h2 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="fa-solid fa-triangle-exclamation text-blue-500"></i> Data Pelanggaran
        </h2>
        <div class="flex gap-3">
            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari nama pelanggaran..."
                class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none w-72" />
            <button
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
                    <th class="py-3 px-4 text-left">Nama Pelanggaran</th>
                    <th class="py-3 px-4 text-left">Poin</th>
                    <th class="py-3 px-4 text-left">Deskripsi</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="pelanggaranTable" class="divide-y divide-gray-100">
                @php
                    $pelanggaranList = [
                        [
                            'nama' => 'Datang Terlambat',
                            'poin' => 5,
                            'deskripsi' => 'Siswa datang lebih dari jam masuk sekolah.',
                        ],
                        [
                            'nama' => 'Tidak Memakai Seragam Lengkap',
                            'poin' => 3,
                            'deskripsi' => 'Siswa tidak mengenakan atribut sekolah.',
                        ],
                        [
                            'nama' => 'Bolos Pelajaran',
                            'poin' => 10,
                            'deskripsi' => 'Siswa tidak mengikuti pelajaran tanpa izin.',
                        ],
                        [
                            'nama' => 'Merokok di Area Sekolah',
                            'poin' => 15,
                            'deskripsi' => 'Siswa kedapatan merokok di lingkungan sekolah.',
                        ],
                        [
                            'nama' => 'Membawa HP Saat Pelajaran',
                            'poin' => 7,
                            'deskripsi' => 'Siswa menggunakan HP tanpa izin guru.',
                        ],
                        [
                            'nama' => 'Tidak Mengerjakan Tugas',
                            'poin' => 4,
                            'deskripsi' => 'Siswa tidak mengumpulkan tugas tepat waktu.',
                        ],
                    ];
                @endphp

                @foreach ($pelanggaranList as $i => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $i + 1 }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $item['nama'] }}</td>
                        <td class="py-3 px-4 text-blue-600 font-semibold">{{ $item['poin'] }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $item['deskripsi'] }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center gap-3 text-gray-600">
                                <button class="hover:text-blue-600 transition" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="hover:text-red-600 transition" title="Hapus" onclick="hapusBaris(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center space-x-2 mt-6" id="pagination"></div>
</div>
