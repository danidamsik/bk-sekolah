<section class="space-y-8 pb-8">

    <!-- Modul Penanganan & Tindak Lanjut -->
    <div class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-2xl border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <div class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full mr-4 shadow-lg">
                <i class="fa-solid fa-hand-paper text-white"></i>
            </div>
            Penanganan & Tindak Lanjut
        </h2>

        <!-- Tabel Siswa & Status Kasus -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-200 rounded-xl shadow-md">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold">Nama Siswa</th>
                        <th class="px-6 py-4 text-left font-semibold">Kelas</th>
                        <th class="px-6 py-4 text-left font-semibold">Tindakan / Sanksi</th>
                        <th class="px-6 py-4 text-left font-semibold">Status Kasus</th>
                        <th class="px-6 py-4 text-left font-semibold">Update Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <!-- Siswa A -->
                    <tr class="hover:bg-gray-50 transition-all duration-200">
                        <td class="px-6 py-4 font-medium text-gray-900">Son Rezky</td>
                        <td class="px-6 py-4 text-gray-600">Informatika 3</td>
                        <td class="px-6 py-4 text-gray-700">Teguran Lisan</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 text-sm font-medium">Baru</span>
                        </td>
                        <td class="px-6 py-4">
                            <select
                                class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option>Baru</option>
                                <option>Diproses</option>
                                <option>Selesai Ditangani</option>
                                <option>Butuh Konseling Lanjutan</option>
                            </select>
                        </td>
                    </tr>

                    <!-- Siswa B -->
                    <tr class="hover:bg-gray-50 transition-all duration-200">
                        <td class="px-6 py-4 font-medium text-gray-900">Aulia Rahman</td>
                        <td class="px-6 py-4 text-gray-600">Informatika 2</td>
                        <td class="px-6 py-4 text-gray-700">Panggilan Orang Tua</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-medium">Diproses</span>
                        </td>
                        <td class="px-6 py-4">
                            <select
                                class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option>Baru</option>
                                <option>Diproses</option>
                                <option>Selesai Ditangani</option>
                                <option>Butuh Konseling Lanjutan</option>
                            </select>
                        </td>
                    </tr>

                    <!-- Siswa C -->
                    <tr class="hover:bg-gray-50 transition-all duration-200">
                        <td class="px-6 py-4 font-medium text-gray-900">Bima Pratama</td>
                        <td class="px-6 py-4 text-gray-600">Informatika 1</td>
                        <td class="px-6 py-4 text-gray-700">Skorsing</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-800 text-sm font-medium">Selesai
                                Ditangani</span>
                        </td>
                        <td class="px-6 py-4">
                            <select
                                class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option>Baru</option>
                                <option>Diproses</option>
                                <option>Selesai Ditangani</option>
                                <option>Butuh Konseling Lanjutan</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pencatatan Sesi Konseling -->
        <div class="mt-8 p-6 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fa-solid fa-comments text-green-500 mr-3"></i> Pencatatan Sesi Konseling
            </h3>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hasil Sesi Konseling</label>
                    <textarea rows="4" placeholder="Catat hasil konseling..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all duration-200 resize-vertical"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rekomendasi</label>
                    <textarea rows="3" placeholder="Berikan rekomendasi..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all duration-200 resize-vertical"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rencana Tindak Lanjut</label>
                    <textarea rows="3" placeholder="Rencana tindak lanjut..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all duration-200 resize-vertical"></textarea>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-semibold shadow-lg">
                        Simpan & Kirim
                    </button>
                </div>
            </form>
        </div>

    </div>

</section>
