<nav class="flex-1 overflow-y-auto py-6 px-3 space-y-2">

    <!-- Dashboard -->
    <a href="/dashboard" wire:navigate
        :class="isMenuActive('dashboard') ? 'bg-indigo-700 shadow-lg' : 'hover:bg-indigo-700/50'"
        class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all group">
        <i class="fas fa-chart-line text-amber-400 text-lg w-6"></i>
        <span x-show="sidebarOpen" class="font-medium">Dashboard</span>
    </a>

    <!-- Master Data -->
    <div class="space-y-1">
        <button @click="masterDataOpen = !masterDataOpen"
            :class="isMenuActive('guru') || isMenuActive('siswa') || isMenuActive('kelas') ||
                isMenuActive('pelanggaran-master') ? 'bg-indigo-700/50' : 'hover:bg-indigo-700/50'"
            class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-all group">
            <div class="flex items-center space-x-3">
                <i class="fas fa-database text-blue-400 text-lg w-6"></i>
                <span x-show="sidebarOpen" class="font-medium">Master Data</span>
            </div>
            <i x-show="sidebarOpen" :class="masterDataOpen ? 'fa-chevron-down' : 'fa-chevron-right'"
                class="fas text-sm text-indigo-300"></i>
        </button>

        <!-- Submenu Master Data -->
        <div x-show="masterDataOpen && sidebarOpen" x-collapse
            class="ml-6 space-y-1 border-l-2 border-indigo-600/50 pl-4">
            <a href="/master-data/data-guru" wire:navigate
                :class="isMenuActive('guru') ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                <i class="fas fa-chalkboard-teacher text-green-400 w-5"></i>
                <span>Data Guru</span>
            </a>
            <a href="/master-data/data-siswa" wire:navigate
                :class="isMenuActive('siswa') ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                <i class="fas fa-user-graduate text-cyan-400 w-5"></i>
                <span>Data Siswa</span>
            </a>
            <a href="/master-data/data-kelas" wire:navigate
                :class="isMenuActive('kelas') ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                <i class="fas fa-door-open text-purple-400 w-5"></i>
                <span>Data Kelas</span>
            </a>
            <a href="/master-data/data-pelanggaran" wire:navigate
                :class="isMenuActive('pelanggaran-master') ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                <i class="fas fa-exclamation-triangle text-red-400 w-5"></i>
                <span>Data Pelanggaran</span>
            </a>
        </div>
    </div>

    <!-- Manajemen Pelanggaran -->
    <div class="space-y-1">
        <button @click="pelanggaranOpen = !pelanggaranOpen"
            :class="isMenuActive('laporan') || isMenuActive('konseling') || isMenuActive('rekap') ?
                'bg-indigo-700/50' : 'hover:bg-indigo-700/50'"
            class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-all group">
            <div class="flex items-center space-x-3">
                <i class="fas fa-clipboard-list text-rose-400 text-lg w-6"></i>
                <span x-show="sidebarOpen" class="font-medium">Manajemen Pelanggaran</span>
            </div>
            <i x-show="sidebarOpen" :class="pelanggaranOpen ? 'fa-chevron-down' : 'fa-chevron-right'"
                class="fas text-sm text-indigo-300"></i>
        </button>

        <!-- Submenu Manajemen Pelanggaran -->
        <div x-show="pelanggaranOpen && sidebarOpen" x-collapse
            class="ml-6 space-y-1 border-l-2 border-indigo-600/50 pl-4">
            <a href="/management-pelanggaran/laporan-pelanggaran" wire:navigate
                :class="isMenuActive('laporan') ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                <i class="fas fa-file-alt text-yellow-400 w-5"></i>
                <span>Laporan Pelanggaran</span>
            </a>
            <a href="/management-pelanggaran/sesi-konseling" wire:navigate
                :class="isMenuActive('konseling') ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                <i class="fas fa-comments text-teal-400 w-5"></i>
                <span>Sesi Konseling</span>
            </a>
            <a href="/management-pelanggaran/rekap-laporan" wire:navigate
                :class="isMenuActive('rekap') ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                <i class="fas fa-chart-bar text-pink-400 w-5"></i>
                <span>Rekap & Laporan</span>
            </a>
        </div>
    </div>

    <!-- Pengaturan Sistem -->
    <a href="/pengaturan-sistem/management-user" wire:navigate
        :class="isMenuActive('user') ? 'bg-indigo-700 shadow-lg' : 'hover:bg-indigo-700/50'"
        class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all group">
        <i class="fas fa-users-cog text-violet-400 text-lg w-6"></i>
        <span x-show="sidebarOpen" class="font-medium">Manajemen User</span>
    </a>
</nav>
