@extends('app')

@section('content')
    <div class="max-w-4xl mx-auto pb-8">
        <section class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-xl border border-gray-100">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center">
                <div class="p-3 bg-blue-100 rounded-full mr-4">
                    <span class="material-icons text-blue-600">edit</span>
                </div>
                Pencatatan Pelanggaran Siswa
            </h2>

            <form class="space-y-8">
                <!-- Nama & Kelas -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="material-icons text-gray-500 mr-2 text-base">person</span>
                            Nama Siswa
                        </label>
                        <input type="text" placeholder="Masukkan nama siswa"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="material-icons text-gray-500 mr-2 text-base">school</span>
                            Kelas
                        </label>
                        <input type="text" placeholder="Kelas siswa"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                    </div>
                </div>

                <!-- Jenis Pelanggaran -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <span class="material-icons text-gray-500 mr-2 text-base">warning</span>
                        Jenis Pelanggaran
                    </label>
                    <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                        <option value="">-- Pilih jenis pelanggaran --</option>
                        <option value="keterlambatan">Keterlambatan</option>
                        <option value="pakaian">Pakaian Tidak Rapi</option>
                        <option value="merokok">Merokok</option>
                        <option value="berkelahi">Perkelahian</option>
                        <option value="akademik">Masalah Akademik</option>
                    </select>
                </div>

                <!-- Pemberi Laporan -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <span class="material-icons text-gray-500 mr-2 text-base">report</span>
                        Pemberi Laporan
                    </label>
                    <input type="text" placeholder="Nama guru/staf pelapor"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                </div>

                <!-- Tanggal, Waktu, Lokasi -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="material-icons text-gray-500 mr-2 text-base">calendar_today</span>
                            Tanggal
                        </label>
                        <input type="date"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="material-icons text-gray-500 mr-2 text-base">schedule</span>
                            Waktu
                        </label>
                        <input type="time"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                    </div>
                    <div class="space-y-2 md:col-span-2 lg:col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="material-icons text-gray-500 mr-2 text-base">location_on</span>
                            Lokasi
                        </label>
                        <input type="text" placeholder="Lokasi kejadian"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <span class="material-icons text-gray-500 mr-2 text-base">description</span>
                        Deskripsi Kronologis
                    </label>
                    <textarea rows="5" placeholder="Tuliskan kronologi kejadian..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md resize-vertical"></textarea>
                </div>

                <!-- Upload Bukti -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <span class="material-icons text-gray-500 mr-2 text-base">attach_file</span>
                        Unggah Bukti (Opsional)
                    </label>
                    <input type="file"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6
                               file:rounded-xl file:border-0
                               file:text-sm file:font-semibold
                               file:bg-gradient-to-r file:from-blue-50 file:to-blue-100 file:text-blue-700
                               hover:file:from-blue-100 hover:file:to-blue-200 transition-all duration-200
                               border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white shadow-sm hover:shadow-md" />
                    <p class="text-xs text-gray-500 mt-2">Format yang didukung: JPG, PNG, PDF. Maksimal 5MB.</p>
                </div>

                <!-- Tombol -->
                <div class="flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                    <button type="reset"
                        class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 rounded-xl hover:from-gray-300 hover:to-gray-400 transition-all duration-200 font-semibold shadow-md hover:shadow-lg">
                        Batal
                    </button>
                    <button type="submit"
                        class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 font-semibold shadow-md hover:shadow-lg">
                        Simpan
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection
