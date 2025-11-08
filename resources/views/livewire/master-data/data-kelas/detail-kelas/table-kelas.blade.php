<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="py-3 px-4 text-left">No</th>
                <th class="py-3 px-4 text-left">NISN</th>
                <th class="py-3 px-4 text-left">Nama</th>
                <th class="py-3 px-4 text-left">Total Poin</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($students as $index => $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4">{{ $index + 1 }}</td>
                    <td class="py-3 px-4">{{ $item->nisn }}</td>
                    <td class="py-3 px-4">{{ $item->name }}</td>
                    <td class="py-3 px-4">{{ $item->total_point }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">
                        Tidak ada data siswa.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
