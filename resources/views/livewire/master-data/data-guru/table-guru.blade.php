<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 space-y-6 animate-slideUp">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fa-solid fa-users text-blue-600"></i> Data Guru
        </h1>

        <div class="flex flex-wrap items-center gap-2">
            <!-- Input Pencarian -->
            <div class="relative">
                <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari nama guru..."
                    class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all duration-200">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>
            </div>

            <!-- Filter Role -->
            <select id="roleFilter" onchange="filterTable()"
                class="border border-gray-300 rounded-xl py-2 px-3 focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all duration-200">
                <option value="">Semua Role</option>
                <option value="Admin">Admin</option>
                <option value="Guru BK">Guru BK</option>
                <option value="Wali Kelas">Wali Kelas</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-hidden rounded-2xl border border-gray-200 shadow">
        <table class="min-w-full border-collapse text-left">
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
                @php
                    $guruList = [
                        [
                            'nama' => 'Budi Santoso',
                            'nip' => '12345678',
                            'email' => 'budi@guru.com',
                            'role' => 'Admin',
                            'no_hp' => '08123456789',
                        ],
                        [
                            'nama' => 'Siti Aisyah',
                            'nip' => '87654321',
                            'email' => 'siti@guru.com',
                            'role' => 'Guru BK',
                            'no_hp' => '08234567890',
                        ],
                        [
                            'nama' => 'Andi Wijaya',
                            'nip' => '11223344',
                            'email' => 'andi@guru.com',
                            'role' => 'Wali Kelas',
                            'no_hp' => '08345678901',
                        ],
                        [
                            'nama' => 'Rahmawati',
                            'nip' => '55667788',
                            'email' => 'rahma@guru.com',
                            'role' => 'Admin',
                            'no_hp' => '08198765432',
                        ],
                        [
                            'nama' => 'Teguh Prasetyo',
                            'nip' => '99887766',
                            'email' => 'teguh@guru.com',
                            'role' => 'Wali Kelas',
                            'no_hp' => '08217654321',
                        ],
                        [
                            'nama' => 'Lina Marlina',
                            'nip' => '66554433',
                            'email' => 'lina@guru.com',
                            'role' => 'Guru BK',
                            'no_hp' => '08318765432',
                        ],
                    ];
                @endphp

                @foreach ($guruList as $i => $guru)
                    <tr class="hover:bg-blue-50 transition duration-150 ease-in-out">
                        <td class="py-3 px-4">{{ $i + 1 }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800">{{ $guru['nama'] }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $guru['nip'] }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $guru['email'] }}</td>
                        <td class="py-3 px-4">
                            <span
                                class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $guru['role'] === 'Admin' ? 'bg-blue-100 text-blue-700' : ($guru['role'] === 'Guru BK' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700') }}">
                                {{ $guru['role'] }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $guru['no_hp'] }}</td>
                        <td class="py-3 px-4 text-center">
                            <button class="text-blue-500 hover:text-blue-700 transition duration-150 mx-1"
                                title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="text-red-500 hover:text-red-700 transition duration-150 mx-1" title="Hapus"
                                onclick="hapusBaris(this)">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center space-x-2 mt-6" id="pagination"></div>
</div>
