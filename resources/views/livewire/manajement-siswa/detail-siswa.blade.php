        <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-2xl border border-gray-100">
            <!-- Profil Siswa -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                <div class="space-y-3 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl">
                    <p class="flex items-center"><i class="fa-solid fa-user text-blue-600 mr-3"></i><span
                            class="font-semibold">Nama:</span> Son Rezky</p>
                    <p class="flex items-center"><i class="fa-solid fa-id-card text-blue-600 mr-3"></i><span
                            class="font-semibold">NISN:</span> 5520122025</p>
                </div>
                <div class="space-y-3 p-4 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl">
                    <p class="flex items-center"><i class="fa-solid fa-school text-green-600 mr-3"></i><span
                            class="font-semibold">Kelas:</span> Informatika 3</p>
                    <p class="flex items-center"><i class="fa-solid fa-chalkboard-teacher text-green-600 mr-3"></i><span
                            class="font-semibold">Wali Kelas:</span> Ibu Sri</p>
                </div>
                <div class="space-y-3 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl">
                    <p class="flex items-center"><i class="fa-solid fa-user-friends text-purple-600 mr-3"></i><span
                            class="font-semibold">Orang Tua/Wali:</span> Bapak Ahmad</p>
                    <p class="flex items-center"><i class="fa-solid fa-phone text-purple-600 mr-3"></i><span
                            class="font-semibold">Kontak:</span> 082283306045</p>
                </div>
            </div>

            <!-- Total Poin Pelanggaran -->
            <div class="mb-8 p-6 bg-gradient-to-r from-red-50 to-pink-50 rounded-xl border border-red-200">
                <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                    <div class="p-2 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full mr-3 shadow-lg">
                        <i class="fa-solid fa-star text-white"></i>
                    </div>
                    Total Poin Pelanggaran
                </h3>
                <div class="flex flex-col md:flex-row md:items-center justify-between space-y-4 md:space-y-0">
                    <div class="flex-1">
                        <div class="w-full bg-gray-200 rounded-full h-6 shadow-inner">
                            <div class="h-6 rounded-full bg-gradient-to-r from-red-500 to-red-600 transition-all duration-500 shadow-lg"
                                style="width: 75%"></div>
                        </div>
                        <p class="text-sm text-gray-600 mt-3 font-medium">75 / 100 Poin</p>
                    </div>
                    <div class="text-right">
                        <p class="text-4xl font-bold text-red-600 animate-pulse">75</p>
                        <p class="text-sm font-medium text-red-600 bg-red-100 px-3 py-1 rounded-full inline-block">
                            Bahaya:
                            75% tercapai</p>
                    </div>
                </div>
            </div>

            <!-- Riwayat Pelanggaran -->
            <div class="overflow-x-auto mb-8">
                <table class="w-full table-auto border border-gray-200 rounded-xl shadow-lg">
                    <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                            <th class="px-6 py-4 text-left font-semibold">Jenis Pelanggaran</th>
                            <th class="px-6 py-4 text-left font-semibold">Poin</th>
                            <th class="px-6 py-4 text-left font-semibold">Sanksi</th>
                            <th class="px-6 py-4 text-left font-semibold">Tindak Lanjut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr
                            class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300">
                            <td class="px-6 py-4 text-gray-900">2023-10-01</td>
                            <td class="px-6 py-4 text-gray-900">Terlambat</td>
                            <td class="px-6 py-4 text-gray-900">5</td>
                            <td class="px-6 py-4 text-gray-900">Peringatan</td>
                            <td class="px-6 py-4 text-gray-900">Konseling</td>
                        </tr>
                        <tr
                            class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300">
                            <td class="px-6 py-4 text-gray-900">2023-09-15</td>
                            <td class="px-6 py-4 text-gray-900">Tidak Kerja PR</td>
                            <td class="px-6 py-4 text-gray-900">10</td>
                            <td class="px-6 py-4 text-gray-900">Tugas Tambahan</td>
                            <td class="px-6 py-4 text-gray-900">Panggilan Orang Tua</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tindak Lanjut & Komunikasi -->
            <div class="p-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <div class="p-2 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full mr-3 shadow-lg">
                        <i class="fa-solid fa-comment-dots text-white"></i>
                    </div>
                    Tindak Lanjut & Komunikasi
                </h3>
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <i class="fa-solid fa-list-check text-blue-600 mr-2"></i> Jenis Tindak Lanjut
                        </label>
                        <select
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                            <option>Konseling</option>
                            <option>Panggilan Orang Tua</option>
                            <option>Skorsing</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <i class="fa-solid fa-envelope text-blue-600 mr-2"></i> Pesan untuk Orang Tua/Wali
                        </label>
                        <textarea rows="4" placeholder="Tulis pesan..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md resize-vertical"></textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-4">
                        <button type="button"
                            class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 rounded-xl hover:from-gray-300 hover:to-gray-400 transition-all duration-200 font-semibold shadow-md hover:shadow-lg flex items-center justify-center">
                            <i class="fa-solid fa-save mr-2"></i> Simpan Draft
                        </button>
                        <button type="submit"
                            class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-semibold shadow-md hover:shadow-lg flex items-center justify-center">
                            <i class="fa-solid fa-paper-plane mr-2"></i> Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
