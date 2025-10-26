<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-2 gap-4">
        <h2 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="fas fa-chalkboard-teacher text-blue-500"></i> Data Kelas
        </h2>
        <div class="flex gap-3">
            <input type="text" id="searchInput" onkeyup="filterTable()"
                placeholder="Cari berdasarkan nama kelas / wali..."
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
                    <th class="py-3 px-4 text-left">Nama Kelas</th>
                    <th class="py-3 px-4 text-left">Wali Kelas</th>
                    <th class="py-3 px-4 text-left">Jumlah Siswa</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="kelasTable" class="divide-y divide-gray-100">
                @php
                    $kelasList = [
                        ['nama' => 'XII IPA 1', 'wali' => 'Bu Rini', 'jumlah' => 32],
                        ['nama' => 'XII IPA 2', 'wali' => 'Pak Dedi', 'jumlah' => 30],
                        ['nama' => 'XI IPA 1', 'wali' => 'Bu Rina', 'jumlah' => 28],
                        ['nama' => 'XI IPA 2', 'wali' => 'Pak Arif', 'jumlah' => 31],
                        ['nama' => 'X IPS 1', 'wali' => 'Bu Dini', 'jumlah' => 29],
                        ['nama' => 'X IPS 2', 'wali' => 'Pak Raka', 'jumlah' => 33],
                        ['nama' => 'XII IPS 1', 'wali' => 'Bu Sari', 'jumlah' => 35],
                        ['nama' => 'XII IPS 2', 'wali' => 'Pak Bambang', 'jumlah' => 30],
                        ['nama' => 'XI IPS 1', 'wali' => 'Bu Tika', 'jumlah' => 27],
                        ['nama' => 'X IPA 1', 'wali' => 'Pak Rudi', 'jumlah' => 34],
                    ];
                @endphp

                @foreach ($kelasList as $i => $kelas)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $i + 1 }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $kelas['nama'] }}</td>
                        <td class="py-3 px-4">{{ $kelas['wali'] }}</td>
                        <td class="py-3 px-4">{{ $kelas['jumlah'] }}</td>
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
