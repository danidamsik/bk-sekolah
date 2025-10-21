        <!-- Daftar Semua Siswa -->
        <div class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-2xl border border-gray-100">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
                <div class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full mr-4 shadow-lg">
                    <i class="fa-solid fa-users text-white"></i>
                </div>
                Daftar Siswa
            </h2>

            <div class="relative w-full sm:w-72 mb-4">
                <span class="material-icons absolute left-3 top-2.5 text-gray-400">search</span>
                <input id="searchInput" type="text" placeholder="Cari siswa..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-400 transition text-gray-700" />
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto border border-gray-200 rounded-xl shadow-md">
                    <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold">Nama</th>
                            <th class="px-6 py-4 text-left font-semibold">NISN</th>
                            <th class="px-6 py-4 text-left font-semibold">Kelas</th>
                            <th class="px-6 py-4 text-left font-semibold">Total Poin</th>
                            <th class="px-6 py-4 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <!-- Siswa 1 -->
                        <tr
                            class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 transform hover:scale-[1.01]">
                            <td class="px-6 py-4 font-medium text-gray-900">Son Rezky</td>
                            <td class="px-6 py-4 text-gray-600">5520122025</td>
                            <td class="px-6 py-4 text-gray-600">Informatika 3</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    75
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/management-siswa/detail">
                                    <button @click="activeDetail = activeDetail === 'son' ? null : 'son'"
                                        class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl font-medium flex items-center">
                                        <i class="fa-solid fa-eye mr-2"></i> Detail
                                    </button>
                                </a>

                            </td>
                        </tr>
                        <!-- Siswa 2 -->
                        <tr
                            class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 transform hover:scale-[1.01]">
                            <td class="px-6 py-4 font-medium text-gray-900">Aulia Rahman</td>
                            <td class="px-6 py-4 text-gray-600">5520122030</td>
                            <td class="px-6 py-4 text-gray-600">Informatika 2</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    40
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <button @click="activeDetail = activeDetail === 'aulia' ? null : 'aulia'"
                                    class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl font-medium flex items-center">
                                    <i class="fa-solid fa-eye mr-2"></i> Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
