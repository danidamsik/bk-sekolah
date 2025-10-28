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
                    <th class="py-3 px-4 text-center">No</th>
                    <th class="py-3 px-4 text-center">Kelas</th>
                    <th class="py-3 px-4 text-center">Jumlah Siswa Melanggar</th>
                    <th class="py-3 px-4 text-center">Total Pelanggaran</th>
                    <th class="py-3 px-4 text-center">Total Poin</th>
                </tr>
            </thead>
            <tbody id="kelasTable" class="divide-y divide-gray-100">
                @foreach ($recapPerClass as $i => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 text-center">{{ $i + 1 }}</td>
                        <td class="py-3 px-4 text-center font-medium text-gray-800">{{ $item['kelas'] }}</td>
                        <td class="py-3 px-4 text-center text-blue-600 font-semibold">{{ $item['jumlah_siswa_melanggar'] }}</td>
                        <td class="py-3 px-4 text-center">{{ $item['total_pelanggaran'] }}</td>
                        <td class="py-3 px-4 text-center">{{ $item['total_point'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
