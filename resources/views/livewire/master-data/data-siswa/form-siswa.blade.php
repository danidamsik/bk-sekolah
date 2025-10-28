<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 animate-slideUp">
    <h3 class="text-xl font-semibold text-gray-700 flex items-center gap-2 mb-4">
        <i class="fas fa-user-plus text-blue-600"></i> Tambah Data Siswa
    </h3>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-gray-600">NISN</label>
            <input x-model="dataSiswa.nisn" type="text" placeholder="Masukkan NISN"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <div>
            <label class="text-sm text-gray-600">Nama Siswa</label>
            <input x-model="dataSiswa.name" type="text" placeholder="Masukkan Nama Siswa"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <div>
            <label class="text-sm text-gray-600">Kelas</label>
            <select x-model="dataSiswa.nama_kelas"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="">Pilih Kelas</option>
                <option value="X IPA 1">X IPA 1</option>
                <option value="XI IPA 1">XI IPA 1</option>
                <option value="XII IPA 1">XII IPA 1</option>
            </select>
        </div>

        <div>
            <label class="text-sm text-gray-600">Wali Kelas</label>
            <select x-model="dataSiswa.wali_kelas"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="">Pilih Wali Kelas</option>
                <option value="Siti Nurhaliza, S.Pd">Siti Nurhaliza, S.Pd</option>
                <option value="Bu Rini">Bu Rini</option>
                <option value="Pak Budi">Pak Budi</option>
                <option value="Bu Sinta">Bu Sinta</option>
            </select>
        </div>

        <div>
            <label class="text-sm text-gray-600">Orang Tua</label>
            <input x-model="dataSiswa.parent_name" type="text" placeholder="Masukkan Nama Orang Tua"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <div>
            <label class="text-sm text-gray-600">Kontak Orang Tua</label>
            <input x-model="dataSiswa.parent_contact" type="text" placeholder="Masukkan Nomor HP Orang Tua"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>
    </form>

    <div class="flex justify-end mt-5">
        <button
            class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl shadow transition duration-200">
            <i class="fas fa-plus"></i> Tambah Data
        </button>
    </div>
</div>
