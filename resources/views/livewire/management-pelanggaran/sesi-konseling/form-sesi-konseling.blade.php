        <div @sesi-konseling.window=
                    "
                        $wire.nama_siswa = $event.detail.nama_siswa;
                        $wire.nama_guru = $event.detail.nama_guru;
                        $wire.session_date = $event.detail.session_date;
                        $wire.status = $event.detail.status;
                        $wire.id = $event.detail.id;
                    "
            class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-700 flex items-center gap-2">
                    <i class="fas fa-user-edit text-blue-600"></i>
                    Tambah Catatan Konseling
                </h2>
            </div>

            <form wire:submit.prevent="createOrUpdate" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Siswa</label>
                        <input wire:model="nama_siswa" type="text" name="nama_siswa"
                            class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                            placeholder="Masukkan nama siswa">
                        @error('nama_siswa')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Guru BK</label>
                        <input wire:model="nama_guru" type="text" name="guru_bk"
                            class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                            placeholder="Masukkan nama guru BK">
                        @error('nama_guru')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Tanggal Sesi</label>
                        <input wire:model="session_date" type="date" name="tanggal"
                            class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                        @error('session_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Status</label>
                        <select name="status" wire:model="status"
                            class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                            <option value="Baru">Baru</option>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Konseling">Konseling</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Rekomendasi</label>
                    <textarea name="rekomendasi" rows="3"
                        class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                        placeholder="Masukkan rekomendasi hasil konseling..."></textarea>
                    @error('rekomendasi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Rencana Tindak Lanjut</label>
                    <textarea name="tindak_lanjut" rows="3"
                        class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                        placeholder="Masukkan rencana tindak lanjut..."></textarea>
                    @error('tindak_lanjut')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 flex items-center gap-2 transition-all duration-300 shadow-md hover:shadow-xl">
                        <i class="fas fa-plus-circle"></i> Tambah Catatan
                    </button>
                </div>
            </form>
        </div>
