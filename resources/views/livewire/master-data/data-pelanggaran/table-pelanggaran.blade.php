<div x-data="{ showDeleteModal: false, id:'' }" class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-2 gap-4">
        <h2 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="fa-solid fa-triangle-exclamation text-blue-500"></i> Data Pelanggaran
        </h2>
        <div class="flex gap-3">
            <input wire:model.live="search" type="text" id="searchInput" placeholder="Cari nama pelanggaran..."
                class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none w-72" />
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="whitespace-nowrap -w-full table-fixed border border-gray-200 rounded-xl overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-center w-16">No</th>
                    <th class="py-3 px-4 text-center">Nama Pelanggaran</th>
                    <th class="py-3 px-4 text-center w-24">Poin</th>
                    <th class="py-3 px-4 text-center">Deskripsi</th>
                    <th class="py-3 px-4 text-center w-28">Aksi</th>
                </tr>
            </thead>

            <tbody id="pelanggaranTable" class="divide-y divide-gray-100">
                @forelse ($dataViolation as $i => $item)
                    <tr class="hover:bg-gray-50 transition text-center">
                        <td class="py-3 px-4"> {{ $dataViolation->firstItem() + $loop->index }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $item->name }}</td>
                        <td class="py-3 px-4 text-blue-600 font-semibold">{{ $item->point }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $item->description }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center gap-3 text-gray-600"> <button
                                    @click="$dispatch('edit-pelanggaran', {
                                            id: {{ $item['id'] }},
                                            name: '{{ $item['name'] }}',
                                            point: '{{ $item['point'] }}',
                                            description: '{{ $item['description'] }}',
                                    })"
                                    class="hover:text-blue-600 transition" title="Edit"> <i class="fas fa-edit"></i>
                                </button>
                                <button class="hover:text-red-600 transition"
                                    @click="showDeleteModal = true; id={{ $item->id }};" title="Hapus"> <i
                                        class="fas fa-trash"></i>
                                </button>
                                <button class="hover:text-green-600 transition" title="Lihat Detail"> <i
                                        class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-500">
                            Tidak ada data pelanggaran
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $dataViolation->links('vendor.pagination.custom-white') }}
    </div>
    @include('component.modal-konfirmasi')
</div>
