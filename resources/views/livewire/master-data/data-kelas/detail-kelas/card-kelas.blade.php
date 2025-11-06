<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 flex items-center gap-3">
        <i class="fas fa-user-tie text-blue-500 text-xl"></i>
        <div>
            <p class="text-gray-600 text-sm">Wali Kelas</p>
            <p class="font-medium text-gray-800">{{ $wali_kelas }}</p>
        </div>
    </div>

    <div class="bg-green-50 p-4 rounded-lg border border-green-100 flex items-center gap-3">
        <i class="fas fa-users text-green-500 text-xl"></i>
        <div>
            <p class="text-gray-600 text-sm">Jumlah Siswa</p>
            <p class="font-medium text-gray-800">{{ $jumlah_siswa }}</p>
        </div>
    </div>

    <div class="bg-red-50 p-4 rounded-lg border border-red-100 flex items-center gap-3">
        <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
        <div>
            <p class="text-gray-600 text-sm">Total Poin Pelanggaran</p>
            <p class="font-medium text-gray-800">{{ $total_point }}</p>
        </div>
    </div>
</div>
