<!-- Cards Statistik -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-6">
    <!-- Card 1 -->
    <div
        class="group bg-white/70 backdrop-blur-xl border border-gray-100 rounded-2xl p-5 shadow-md hover:shadow-xl transition-transform hover:-translate-y-1 duration-300">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-sm font-medium text-gray-500">Total Siswa</h2>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{$totalSiswa}}</p>
            </div>
            <div
                class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center text-white shadow-lg">
                <i class="fas fa-user-graduate text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div
        class="group bg-white/70 backdrop-blur-xl border border-gray-100 rounded-2xl p-5 shadow-md hover:shadow-xl transition-transform hover:-translate-y-1 duration-300">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-sm font-medium text-gray-500">Pelanggaran Bulan Ini</h2>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{$pelanggaranBulanIni}}</p>
            </div>
            <div
                class="w-12 h-12 rounded-xl bg-gradient-to-br from-rose-500 to-pink-600 flex items-center justify-center text-white shadow-lg">
                <i class="fas fa-exclamation-triangle text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div
        class="group bg-white/70 backdrop-blur-xl border border-gray-100 rounded-2xl p-5 shadow-md hover:shadow-xl transition-transform hover:-translate-y-1 duration-300">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-sm font-medium text-gray-500">Siswa Poin > 50</h2>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{$siswaPoinTinggi}}</p>
            </div>
            <div
                class="w-12 h-12 rounded-xl bg-gradient-to-br from-yellow-400 to-amber-500 flex items-center justify-center text-white shadow-lg">
                <i class="fas fa-star text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Card 4 -->
    <div
        class="group bg-white/70 backdrop-blur-xl border border-gray-100 rounded-2xl p-5 shadow-md hover:shadow-xl transition-transform hover:-translate-y-1 duration-300">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-sm font-medium text-gray-500">Kasus Selesai</h2>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{$kasusSelesai}}</p>
            </div>
            <div
                class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white shadow-lg">
                <i class="fas fa-check-circle text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Card 5 -->
    <div
        class="group bg-white/70 backdrop-blur-xl border border-gray-100 rounded-2xl p-5 shadow-md hover:shadow-xl transition-transform hover:-translate-y-1 duration-300">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-sm font-medium text-gray-500">Kasus Terbaru</h2>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{$kasusTerbaru}}</p>
            </div>
            <div
                class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-sky-600 flex items-center justify-center text-white shadow-lg">
                <i class="fas fa-bell text-xl"></i>
            </div>
        </div>
    </div>
</div>
