<div
    class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 transition-all duration-500 hover:shadow-2xl backdrop-blur-sm">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-extrabold text-gray-800 flex items-center gap-3">
            <i class="fa-solid fa-users-gear text-indigo-600 text-4xl"></i>
            Data User
        </h2>

        {{-- Tombol Reset Password --}}
        <button
            class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white px-6 py-3 rounded-xl font-semibold flex items-center gap-2 transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
            <i class="fa-solid fa-key"></i> Reset Password
        </button>
    </div>

    <div class="overflow-x-auto rounded-xl shadow-inner">
        <table id="userTable"
            class="min-w-full text-sm text-gray-700 border border-gray-200 bg-white rounded-xl overflow-hidden">
            <thead class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-center">
                <tr>
                    <th class="py-4 px-6 font-semibold text-lg">No</th>
                    <th class="py-4 px-6 font-semibold text-lg">Nama</th>
                    <th class="py-4 px-6 font-semibold text-lg">Email</th>
                    <th class="py-4 px-6 font-semibold text-lg">Role</th>
                    <th class="py-4 px-6 font-semibold text-lg">Nama Guru</th>
                    <th class="py-4 px-6 font-semibold text-lg">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-center">
                @php
                    $users = [
                        ['nama' => 'Rafi Hidayat', 'email' => 'rafi@mail.com', 'role' => 'Admin', 'guru' => 'Pak Dedi'],
                        ['nama' => 'Siti Rahma', 'email' => 'siti@mail.com', 'role' => 'Guru', 'guru' => 'Bu Lina'],
                        ['nama' => 'Ahmad Fauzi', 'email' => 'ahmad@mail.com', 'role' => 'Guru', 'guru' => 'Pak Rudi'],
                        [
                            'nama' => 'Dewi Anggraini',
                            'email' => 'dewi@mail.com',
                            'role' => 'Admin',
                            'guru' => 'Bu Sari',
                        ],
                        ['nama' => 'Budi Setiawan', 'email' => 'budi@mail.com', 'role' => 'Guru', 'guru' => 'Pak Deni'],
                        ['nama' => 'Nanda Putri', 'email' => 'nanda@mail.com', 'role' => 'Guru', 'guru' => 'Bu Rina'],
                    ];
                @endphp

                @foreach ($users as $i => $item)
                    <tr class="hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 transition-all duration-300">
                        <td class="py-4 px-6">{{ $i + 1 }}</td>
                        <td class="py-4 px-6 font-medium">{{ $item['nama'] }}</td>
                        <td class="py-4 px-6">{{ $item['email'] }}</td>
                        <td class="py-4 px-6">
                            @if ($item['role'] === 'Admin')
                                <span
                                    class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">{{ $item['role'] }}</span>
                            @else
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">{{ $item['role'] }}</span>
                            @endif
                        </td>
                        <td class="py-4 px-6">{{ $item['guru'] }}</td>
                        <td class="py-4 px-6 flex justify-center gap-3">
                            <button
                                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg text-sm flex items-center gap-2 transition-all duration-300 hover:scale-105 shadow-md hover:shadow-lg">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </button>
                            <button
                                class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-lg text-sm flex items-center gap-2 transition-all duration-300 hover:scale-105 shadow-md hover:shadow-lg">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center space-x-2 mt-6" id="paginationUser"></div>
</div>
