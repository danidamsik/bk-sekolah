<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 space-y-6 animate-slideUp" x-data="{ id: '' }">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fa-solid fa-users text-blue-600"></i> Data Guru
        </h1>

        <div class="flex flex-wrap items-center gap-2">
            <!-- Input Pencarian -->
            <div class="relative">
                <input type="text" wire:model.live="search" placeholder="Cari nama guru..."
                    class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all duration-200">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>
            </div>

            <!-- Filter Role -->
            <select wire:model.live="roleFilter"
                class="border border-gray-300 rounded-xl py-2 px-3 focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all duration-200">
                <option value="">Semua Role</option>
                <option value="Admin">Admin</option>
                <option value="GuruBK">Guru BK</option>
                <option value="WaliKelas">Wali Kelas</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow">
        <table class="min-w-[1200px] border-collapse text-left whitespace-nowrap">
            <thead class="bg-blue-600 text-white text-sm">
                <tr>
                    <th class="py-3 px-4 font-semibold">No</th>
                    <th class="py-3 px-4 font-semibold">Nama Guru</th>
                    <th class="py-3 px-4 font-semibold">NIP</th>
                    <th class="py-3 px-4 font-semibold">Email</th>
                    <th class="py-3 px-4 font-semibold">Role</th>
                    <th class="py-3 px-4 font-semibold">No HP</th>
                    <th class="py-3 px-4 text-center font-semibold">Action</th>
                </tr>
            </thead>

            <tbody id="guruTable" class="divide-y divide-gray-100">
                @forelse ($dataGuru as $i => $guru)
                    <tr class="hover:bg-blue-50 transition duration-150 ease-in-out">
                        <td class="py-3 px-4">{{ $dataGuru->firstItem() + $i }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800 max-w-[200px] overflow-hidden text-ellipsis">
                            {{ $guru->name }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $guru->nip }}</td>

                        <!-- Kolom Email -->
                        <td class="py-3 px-4 text-gray-600 max-w-[250px] overflow-hidden text-ellipsis">
                            @if ($guru->email == null)
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">
                                    belum ada email
                                </span>
                            @else
                                {{ $guru->email }}
                            @endif
                        </td>

                        <!-- Kolom Role -->
                        <td class="py-3 px-4">
                            @if ($guru->role)
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $guru->role === 'Admin'
                                    ? 'bg-blue-100 text-blue-700'
                                    : ($guru->role === 'GuruBK'
                                        ? 'bg-green-100 text-green-700'
                                        : ($guru->role === 'WaliKelas'
                                            ? 'bg-yellow-100 text-yellow-700'
                                            : 'bg-gray-100 text-gray-600')) }}">
                                    {{ $guru->role }}
                                </span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">
                                    Belum Ada Role
                                </span>
                            @endif
                        </td>

                        <td class="py-3 px-4 text-gray-600">{{ $guru->phone }}</td>

                        <!-- Tombol Aksi -->
                        <td class="py-3 px-4 text-center">
                            <button class="text-blue-500 hover:text-blue-700 transition duration-150 mx-1"
                                @click="$dispatch('edit-guru', {
                                id: {{ $guru->id }},
                                name: '{{ $guru->name }}',
                                nip: '{{ $guru->nip }}',
                                phone: '{{ $guru->phone }}' });
                                 $store.notif.open = false;
                                 $refs.formSection.scrollIntoView({ behavior: 'smooth' })
                                 "
                                title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <button class="text-red-500 hover:text-red-700 transition duration-150 mx-1"
                                @click="$wire.modal = true; id={{ $guru->id }};" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-3 text-center text-gray-500">Tidak ada data guru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $dataGuru->links('vendor.pagination.custom-white') }}
    </div>

    @include('components.modal-confirm')


</div>
