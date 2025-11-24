<div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300">
    {{-- Header & Filter --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <h2 class="text-xl font-bold text-gray-700 flex items-center gap-2">
            <i class="fas fa-comments text-green-600"></i>
            Data Sesi Konseling
        </h2>

        <div class="flex flex-wrap gap-3 items-center">
            <select wire:model.live="status"
                class="p-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-green-400 outline-none transition-all duration-200">
                <option value="">Semua Status</option>
                <option value="Baru">Baru</option>
                <option value="Diproses">Di Proses</option>
                <option value="Selesai">Selesai</option>
                <option value="Konseling">Konseling</option>
            </select>
        </div>
    </div>
    <div class="overflow-x-auto border border-gray-100 rounded-xl">
        <table class="whitespace-nowrap min-w-full border-collapse text-left">
            <thead class="bg-gray-50 text-gray-700 uppercase text-sm font-semibold">
                <tr class="text-center">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Nama Siswa</th>
                    <th class="py-3 px-4">Guru BK</th>
                    <th class="py-3 px-4">Tanggal Sesi</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="konselingTable" class="text-gray-600 divide-y divide-gray-100 text-center">
                @foreach ($dataKonseling as $i => $item)
                    <tr class="hover:bg-gray-50 transition-all duration-200">
                        <td class="py-3 px-4 font-medium">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4">{{ $item['nama_siswa'] }}</td>
                        <td class="py-3 px-4">{{ $item['nama_guru'] }}</td>
                        <td class="py-3 px-4">{{ $item['session_date'] }}</td>
                        <td class="py-3 px-4">
                            @if ($item['status'] === 'Baru')
                                <span
                                    class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-medium">Baru</span>
                            @elseif ($item['status'] === 'Diproses')
                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Diproses</span>
                            @elseif ($item['status'] === 'Konseling')
                                <span
                                    class="bg-cyan-100 text-cyan-700 px-3 py-1 rounded-full text-xs font-medium">Konseling</span>
                            @elseif ($item['status'] === 'Selesai')
                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Selesai</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-center space-x-3">
                            <button
                                @click="$dispatch('sesi-konseling', {
                                            id: '{{ $item['id'] }}',
                                            violation_report_id: '{{ $item['violation_report_id'] }}',
                                            student_id: '{{ $item['student_id'] }}',
                                            teacher_id: '{{ $item['teacher_id'] }}',
                                            session_date: '{{ $item['session_date'] }}'.split(' ')[0],
                                            status: '{{ $item['status'] }}',
                                            notes: '{{ $item['notes'] }}',
                                            recommendation: '{{ $item['recommendation'] }}',
                                            follow_up_plan: '{{ $item['follow_up_plan'] }}',
                                    });
                                            $refs.formSection.scrollIntoView({ behavior: 'smooth' })
                                    "
                                class="text-green-600 hover:text-green-800 transition-all duration-200">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $dataKonseling->links('vendor.pagination.custom-white') }}
    </div>
</div>
