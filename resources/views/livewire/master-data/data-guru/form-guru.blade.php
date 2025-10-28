<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 space-y-4 animate-slideUp">
    <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
        <i class="fa-solid fa-user-plus text-blue-600"></i> Form Tambah Data Guru
    </h2>

    <form wire:submit.prevent="tambahDataGuru" id="formGuru" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-gray-600">Nama Guru</label>
            <input x-model="dataGuru.name" wire:model='namaGuru' type="text" id="namaGuru" placeholder="Masukkan nama guru"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
        </div>
        <div>
            <label class="text-sm text-gray-600">NIP</label>
            <input x-model="dataGuru.nip" wire:model='nip' type="text" id="nipGuru" placeholder="Masukkan NIP"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
        </div>
        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input x-model="dataGuru.email" wire:model='emailGuru' type="email" id="emailGuru" placeholder="Masukkan email guru"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
        </div>
        <div>
            <label class="text-sm text-gray-600">No HP</label>
            <input x-model="dataGuru.phone" wire:model='noHpGuru' type="text" id="noHpGuru" placeholder="Masukkan nomor HP"
                class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-xl shadow hover:bg-blue-700 transition duration-200">
                <i class="fa-solid fa-plus"></i> Tambah Data
            </button>
        </div>
    </form>

</div>
