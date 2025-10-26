<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-2 gap-4">
        <h2 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="fas fa-user-graduate text-blue-500"></i> Rekap Pelanggaran Per Siswa
        </h2>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Nama Siswa</th>
                    <th class="py-3 px-4 text-left">Kelas</th>
                    <th class="py-3 px-4 text-center">Total Pelanggaran</th>
                    <th class="py-3 px-4 text-center">Total Poin</th>
                </tr>
            </thead>
            <tbody id="siswaTable" class="divide-y divide-gray-100">
                @php
                    $rekapSiswa = [
                        ['nama' => 'Rafi Akbar', 'kelas' => 'XII IPA 1', 'pelanggaran' => 3, 'poin' => 45],
                        ['nama' => 'Dinda Lestari', 'kelas' => 'XII IPS 2', 'pelanggaran' => 2, 'poin' => 30],
                        ['nama' => 'Aulia Rahman', 'kelas' => 'XI IPA 3', 'pelanggaran' => 1, 'poin' => 15],
                        ['nama' => 'Fajar Nugraha', 'kelas' => 'XII IPA 2', 'pelanggaran' => 4, 'poin' => 60],
                        ['nama' => 'Nanda Putri', 'kelas' => 'XI IPS 1', 'pelanggaran' => 3, 'poin' => 45],
                        ['nama' => 'Dewi Anggraini', 'kelas' => 'X IPA 3', 'pelanggaran' => 2, 'poin' => 30],
                    ];
                @endphp

                @foreach ($rekapSiswa as $i => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $i + 1 }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $item['nama'] }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $item['kelas'] }}</td>
                        <td class="py-3 px-4 text-center text-blue-600 font-semibold">{{ $item['pelanggaran'] }}</td>
                        <td class="py-3 px-4 text-center">{{ $item['poin'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center space-x-2 mt-6" id="paginationSiswa"></div>
</div>
