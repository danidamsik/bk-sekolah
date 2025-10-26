<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 space-y-4 animate-slideUp">
    <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
        <i class="fa-solid fa-plus text-blue-600"></i> Form Tambah Pelanggaran
    </h2>

    <form id="formPelanggaran" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-gray-600">Nama Pelanggaran</label>
            <input type="text" id="namaPelanggaran" placeholder="Masukkan nama pelanggaran"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" />
        </div>

        <div>
            <label class="text-sm text-gray-600">Poin</label>
            <input type="number" id="poinPelanggaran" placeholder="Masukkan poin pelanggaran"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" />
        </div>

        <div class="md:col-span-2">
            <label class="text-sm text-gray-600">Deskripsi</label>
            <textarea id="deskripsiPelanggaran" placeholder="Masukkan deskripsi pelanggaran"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none"
                rows="3"></textarea>
        </div>
    </form>

    <div class="flex justify-end">
        <button onclick="tambahDataPelanggaran()"
            class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-xl shadow hover:bg-blue-700 transition duration-200">
            <i class="fa-solid fa-plus"></i> Tambah Data
        </button>
    </div>
</div>
