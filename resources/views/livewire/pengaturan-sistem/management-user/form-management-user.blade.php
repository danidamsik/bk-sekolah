<div
    class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 transition-all duration-500 hover:shadow-2xl backdrop-blur-sm">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fa-solid fa-user-plus text-indigo-600 text-4xl"></i>
        Tambah / Edit User
    </h2>

    <form class="space-y-6">
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm mb-2 font-semibold">Nama</label>
                <input type="text" placeholder="Masukkan nama"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md">
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-2 font-semibold">Email</label>
                <input type="email" placeholder="Masukkan email"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md">
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-2 font-semibold">Role</label>
                <select
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md">
                    <option value="">Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="guru">Guru</option>
                    <option value="siswa">Siswa</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-2 font-semibold">Nama Guru</label>
                <input type="text" placeholder="Masukkan nama guru"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md">
            </div>
        </div>

        {{-- Tombol Tambah User --}}
        <div class="pt-4 flex justify-end">
            <button type="submit"
                class="bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white px-6 py-3 rounded-xl font-semibold flex items-center gap-2 transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                <i class="fa-solid fa-user-plus"></i> Tambah User
            </button>
        </div>
    </form>
</div>
