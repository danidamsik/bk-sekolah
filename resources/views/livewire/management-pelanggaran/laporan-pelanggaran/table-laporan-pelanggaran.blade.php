<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-2 gap-4">
        <h2 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="fa-solid fa-triangle-exclamation text-green-600"></i> Data Laporan Pelanggaran
        </h2>

        <div class="flex flex-wrap gap-3 items-center">
            <select
                class="p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:outline-none transition-all">
                <option value="">Pilih Kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
            <select
                class="p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:outline-none transition-all">
                <option value="">Status</option>
                <option value="Baru">Baru</option>
                <option value="Diproses">Diproses</option>
                <option value="Selesai">Selesai</option>
                <option value="Konseling">Konseling</option>
            </select>
            <input type="date"
                class="p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:outline-none transition-all">
            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari nama siswa..."
                class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none w-72" />
            <button
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <i class="fas fa-search"></i> Filter
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Nama Siswa</th>
                    <th class="py-3 px-4 text-left">Kelas</th>
                    <th class="py-3 px-4 text-left">Jenis Pelanggaran</th>
                    <th class="py-3 px-4 text-left">Guru Pelapor</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="laporanTable" class="divide-y divide-gray-100">
                @php
                    $laporanList = [
                        [
                            'nama' => 'Rasya Ahmad',
                            'kelas' => 'XII IPA 2',
                            'pelanggaran' => 'Tidak memakai seragam',
                            'guru' => 'Bu Rini',
                            'tanggal' => '2025-10-25',
                            'status' => 'Diproses',
                        ],
                        [
                            'nama' => 'Lina Marlina',
                            'kelas' => 'XI IPS 1',
                            'pelanggaran' => 'Bolos Pelajaran',
                            'guru' => 'Pak Deni',
                            'tanggal' => '2025-10-24',
                            'status' => 'Baru',
                        ],
                        [
                            'nama' => 'Andi Pratama',
                            'kelas' => 'X IPA 2',
                            'pelanggaran' => 'Datang Terlambat',
                            'guru' => 'Bu Rini',
                            'tanggal' => '2025-10-23',
                            'status' => 'Selesai',
                        ],
                        [
                            'nama' => 'Budi Santoso',
                            'kelas' => 'XII IPS 3',
                            'pelanggaran' => 'Merokok di Area Sekolah',
                            'guru' => 'Pak Bambang',
                            'tanggal' => '2025-10-22',
                            'status' => 'Konseling',
                        ],
                        [
                            'nama' => 'Rina Amelia',
                            'kelas' => 'XI IPA 1',
                            'pelanggaran' => 'Tidak Mengerjakan Tugas',
                            'guru' => 'Bu Lina',
                            'tanggal' => '2025-10-21',
                            'status' => 'Selesai',
                        ],
                    ];
                @endphp

                @foreach ($laporanList as $i => $laporan)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $i + 1 }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $laporan['nama'] }}</td>
                        <td class="py-3 px-4">{{ $laporan['kelas'] }}</td>
                        <td class="py-3 px-4">{{ $laporan['pelanggaran'] }}</td>
                        <td class="py-3 px-4">{{ $laporan['guru'] }}</td>
                        <td class="py-3 px-4">{{ $laporan['tanggal'] }}</td>
                        <td class="py-3 px-4">
                            @php
                                $statusColor =
                                    [
                                        'Baru' => 'bg-blue-100 text-blue-700',
                                        'Diproses' => 'bg-yellow-100 text-yellow-700',
                                        'Selesai' => 'bg-green-100 text-green-700',
                                        'Konseling' => 'bg-purple-100 text-purple-700',
                                    ][$laporan['status']] ?? 'bg-gray-100 text-gray-700';
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                                {{ $laporan['status'] }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center gap-3 text-gray-600">
                                <button class="hover:text-blue-600 transition" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="hover:text-green-600 transition" title="Edit">
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
