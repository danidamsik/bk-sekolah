<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-2 gap-4">
        <h2 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="fas fa-user-graduate text-blue-500"></i> Data Siswa
        </h2>
        <div class="flex gap-3">
            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari berdasarkan NISN / Nama..."
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
            <tbody id="siswaTable" class="divide-y divide-gray-100">
                @php
                    $siswaList = [
                        [
                            'nisn' => '1234567890',
                            'nama' => 'Andi Pratama',
                            'kelas' => 'XII IPA 1',
                            'wali' => 'Bu Rini',
                            'point' => 45,
                            'ortu' => 'Pak Ahmad',
                            'kontak' => '08123456789',
                        ],
                        [
                            'nisn' => '9876543210',
                            'nama' => 'Siti Nurhaliza',
                            'kelas' => 'XI IPS 2',
                            'wali' => 'Pak Deni',
                            'point' => 30,
                            'ortu' => 'Bu Sari',
                            'kontak' => '08234567890',
                        ],
                        [
                            'nisn' => '4567891230',
                            'nama' => 'Budi Santoso',
                            'kelas' => 'X IPA 3',
                            'wali' => 'Bu Lina',
                            'point' => 70,
                            'ortu' => 'Pak Joko',
                            'kontak' => '08345678912',
                        ],
                        [
                            'nisn' => '2345678901',
                            'nama' => 'Rina Amelia',
                            'kelas' => 'XI IPA 1',
                            'wali' => 'Bu Rini',
                            'point' => 60,
                            'ortu' => 'Bu Dewi',
                            'kontak' => '08122334455',
                        ],
                        [
                            'nisn' => '1122334455',
                            'nama' => 'Teguh Hidayat',
                            'kelas' => 'XII IPS 3',
                            'wali' => 'Pak Bambang',
                            'point' => 25,
                            'ortu' => 'Pak Slamet',
                            'kontak' => '08567788990',
                        ],
                        [
                            'nisn' => '9988776655',
                            'nama' => 'Lina Marlina',
                            'kelas' => 'X IPA 2',
                            'wali' => 'Bu Sinta',
                            'point' => 50,
                            'ortu' => 'Pak Yusuf',
                            'kontak' => '08134566789',
                        ],
                    ];
                @endphp

                @foreach ($siswaList as $i => $siswa)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $i + 1 }}</td>
                        <td class="py-3 px-4">{{ $siswa['nisn'] }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $siswa['nama'] }}</td>
                        <td class="py-3 px-4">{{ $siswa['kelas'] }}</td>
                        <td class="py-3 px-4">{{ $siswa['wali'] }}</td>
                        <td class="py-3 px-4 text-blue-600 font-semibold">{{ $siswa['point'] }}</td>
                        <td class="py-3 px-4">{{ $siswa['ortu'] }}</td>
                        <td class="py-3 px-4">{{ $siswa['kontak'] }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center gap-3 text-gray-600">
                                <button class="hover:text-blue-600 transition" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="hover:text-red-600 transition" title="Hapus" onclick="hapusBaris(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="hover:text-green-600 transition" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
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
