<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 space-y-6 mt-10">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-2 gap-4">
        <h2 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="fas fa-chalkboard text-blue-500"></i> Rekap Pelanggaran Per Kelas
        </h2>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Kelas</th>
                    <th class="py-3 px-4 text-center">Jumlah Siswa Melanggar</th>
                    <th class="py-3 px-4 text-center">Total Pelanggaran</th>
                    <th class="py-3 px-4 text-center">Total Poin</th>
                </tr>
            </thead>
            <tbody id="kelasTable" class="divide-y divide-gray-100">
                @php
                    $rekapKelas = [
                        ['kelas' => 'XII IPA 1', 'siswa' => 5, 'pelanggaran' => 12, 'poin' => 180],
                        ['kelas' => 'XI IPS 2', 'siswa' => 3, 'pelanggaran' => 7, 'poin' => 105],
                        ['kelas' => 'X IPA 3', 'siswa' => 2, 'pelanggaran' => 4, 'poin' => 60],
                        ['kelas' => 'XI IPA 1', 'siswa' => 4, 'pelanggaran' => 8, 'poin' => 120],
                        ['kelas' => 'XII IPS 1', 'siswa' => 6, 'pelanggaran' => 10, 'poin' => 150],
                        ['kelas' => 'X IPA 2', 'siswa' => 3, 'pelanggaran' => 6, 'poin' => 90],
                    ];
                @endphp

                @foreach ($rekapKelas as $i => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $i + 1 }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $item['kelas'] }}</td>
                        <td class="py-3 px-4 text-center text-blue-600 font-semibold">{{ $item['siswa'] }}</td>
                        <td class="py-3 px-4 text-center">{{ $item['pelanggaran'] }}</td>
                        <td class="py-3 px-4 text-center">{{ $item['poin'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center space-x-2 mt-6" id="paginationKelas"></div>
</div>
