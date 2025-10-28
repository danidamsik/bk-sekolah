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
        <table class="min-w-full table-fixed border border-gray-200 rounded-xl overflow-hidden">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-center w-12">No</th>
                    <th class="py-3 px-4 text-center">Nama Siswa</th>
                    <th class="py-3 px-4 text-center">Kelas</th>
                    <th class="py-3 px-4 text-center">Jenis Pelanggaran</th>
                    <th class="py-3 px-4 text-center">Guru Pelapor</th>
                    <th class="py-3 px-4 text-center">Tanggal</th>
                    <th class="py-3 px-4 text-center">Status</th>
                    <th class="py-3 px-4 text-center w-28">Aksi</th>
                </tr>
            </thead>

            <tbody id="laporanTable" class="divide-y divide-gray-100 text-center">
                @forelse ($violationReport as $i => $laporan)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4"> {{ $violationReport->firstItem() + $loop->index }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $laporan->nama_siswa }}</td>
                        <td class="py-3 px-4">{{ $laporan->class_name }}</td>
                        <td class="py-3 px-4">{{ $laporan->name_pelanggaran }}</td>
                        <td class="py-3 px-4">{{ $laporan->name_teacher }}</td>
                        <td class="py-3 px-4">{{ $laporan->date }}</td>
                        <td class="py-3 px-4">
                            @php
                                $statusColor = match ($laporan->status) {
                                    'Baru' => 'bg-blue-100 text-blue-700',
                                    'Diproses' => 'bg-yellow-100 text-yellow-700',
                                    'Selesai' => 'bg-green-100 text-green-700',
                                    'Konseling' => 'bg-purple-100 text-purple-700',
                                    default => 'bg-gray-100 text-gray-700',
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                                {{ $laporan->status }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex justify-center gap-3 text-gray-600">
                                <button wire:click="lihat({{ $laporan->id }})" class="hover:text-blue-600 transition"
                                    title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button @click="laporanPelanggaran = {
                                        nama_siswa: '{{$laporan['nama_siswa']}}',
                                        class_name: '{{$laporan['class_name']}}',
                                        name_pelanggaran: '{{$laporan['name_pelanggaran']}}',
                                        name_teacher: '{{$laporan['name_teacher']}}',
                                        date: '{{$laporan['date']}}'.split(' ')[0],
                                        status: '{{$laporan['status']}}',
                                    }"

                                 class="hover:text-green-600 transition"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="hapus({{ $laporan->id }})" class="hover:text-red-600 transition"
                                    title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-4 text-gray-500">Tidak ada data laporan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Pagination --> 
    <div class="mt-6">
        {{ $violationReport->links('vendor.pagination.custom-white') }}
    </div>

</div>
