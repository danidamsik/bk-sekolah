        <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 transition-all hover:shadow-xl">
            <h3 class="text-xl font-semibold text-gray-700 mb-6 flex items-center gap-2">
                <i class="fas fa-list text-green-500"></i> Detail Kelas: XII IPA 1
            </h3>

            {{-- START: Info Ringkas --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 flex items-center gap-3">
                    <i class="fas fa-user-tie text-blue-500 text-xl"></i>
                    <div>
                        <p class="text-gray-600 text-sm">Wali Kelas</p>
                        <p class="font-medium text-gray-800">Bu Rini</p>
                    </div>
                </div>

                <div class="bg-green-50 p-4 rounded-lg border border-green-100 flex items-center gap-3">
                    <i class="fas fa-users text-green-500 text-xl"></i>
                    <div>
                        <p class="text-gray-600 text-sm">Jumlah Siswa</p>
                        <p class="font-medium text-gray-800">32</p>
                    </div>
                </div>

                <div class="bg-red-50 p-4 rounded-lg border border-red-100 flex items-center gap-3">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                    <div>
                        <p class="text-gray-600 text-sm">Total Poin Pelanggaran</p>
                        <p class="font-medium text-gray-800">120</p>
                    </div>
                </div>
            </div>
            {{-- END: Info Ringkas --}}

            {{-- START: Daftar Siswa --}}
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
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-4">1</td>
                            <td class="py-3 px-4">1234567890</td>
                            <td class="py-3 px-4">Andi Pratama</td>
                            <td class="py-3 px-4">15</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-4">2</td>
                            <td class="py-3 px-4">1234567891</td>
                            <td class="py-3 px-4">Budi Santoso</td>
                            <td class="py-3 px-4">20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- END: Daftar Siswa --}}
        </div>
