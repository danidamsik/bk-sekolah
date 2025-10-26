<div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="font-semibold text-gray-700 text-lg">Top 10 Kelas Pelanggaran Tertinggi</h3>
        <button class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Lihat Semua</button>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm" id="tableKelas">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="py-2 px-3 text-left">No</th>
                    <th class="py-2 px-3 text-left">Nama Kelas</th>
                    <th class="py-2 px-3 text-left">Wali Kelas</th>
                    <th class="py-2 px-3 text-left">Jumlah Siswa</th>
                    <th class="py-2 px-3 text-left">Total Pelanggaran</th>
                    <th class="py-2 px-3 text-left">Rata-rata Poin/Siswa</th>
                    <th class="py-2 px-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($topKelas as $index => $kelas)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-2 px-3 font-medium">
                            {{ $loop->iteration }}
                        </td>
                        <td class="py-2 px-3">{{ $kelas->nama_kelas }}</td>
                        <td class="py-2 px-3">{{ $kelas->wali_kelas }}</td>
                        <td class="py-2 px-3">{{ $kelas->jumlah_siswa }}</td>
                        <td class="py-2 px-3">{{ $kelas->total_pelanggaran }}</td>
                        <td class="py-2 px-3">{{ $kelas->rata_rata_poin_per_siswa }}</td>
                        <td class="py-2 px-3 text-center">
                            <button wire:click="detail('{{ $kelas['nama_kelas'] }}')"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                Detail
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-3 text-center text-gray-500">
                            Tidak ada data kelas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
