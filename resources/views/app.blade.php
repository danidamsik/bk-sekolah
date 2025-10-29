<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Pelanggaran Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <div x-data="{
        sidebarOpen: true,
        masterDataOpen: $persist(false).as('masterDataOpen'),
        pelanggaranOpen: $persist(false).as('pelanggaranOpen'),
        activeMenu: $persist('dashboard').as('activeMenu'),
    
        // Fungsi untuk set active menu dan persist
        setActiveMenu(menu) {
            this.activeMenu = menu;
        },
    
        // Check if current path matches
        isActive(path) {
            return window.location.pathname === path;
        },
    
        // Check if submenu should be active
        isSubmenuActive(submenu) {
            const paths = {
                'guru': '/master-data/data-guru',
                'siswa': '/master-data/data-siswa',
                'kelas': '/master-data/data-kelas',
                'pelanggaran-master': '/master-data/data-pelanggaran',
                'laporan': '/management-pelanggaran/laporan-pelanggaran',
                'konseling': '/management-pelanggaran/sesi-konseling',
                'rekap': '/management-pelanggaran/rekap-laporan'
            };
            return window.location.pathname === paths[submenu];
        }
    }" x-init="// Set active menu based on current URL on page load
    const path = window.location.pathname;
    if (path === '/dashboard') {
        activeMenu = 'dashboard';
    } else if (path.includes('/master-data')) {
        masterDataOpen = true;
        if (path.includes('data-guru')) activeMenu = 'guru';
        else if (path.includes('data-siswa')) activeMenu = 'siswa';
        else if (path.includes('data-kelas')) activeMenu = 'kelas';
        else if (path.includes('data-pelanggaran')) activeMenu = 'pelanggaran-master';
    } else if (path.includes('/management-pelanggaran')) {
        pelanggaranOpen = true;
        if (path.includes('laporan-pelanggaran')) activeMenu = 'laporan';
        else if (path.includes('sesi-konseling')) activeMenu = 'konseling';
        else if (path.includes('rekap-laporan')) activeMenu = 'rekap';
    } else if (path.includes('/pengaturan-sitem/management-user')) {
        activeMenu = 'user';
    }" class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'w-72' : 'w-20'"
            class="bg-gradient-to-b from-indigo-900 via-indigo-800 to-indigo-900 text-white transition-all duration-300 flex flex-col shadow-2xl">

            <!-- Header Sidebar -->
            <div class="flex items-center justify-between p-6 border-b border-indigo-700/50">
                <div x-show="sidebarOpen" class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-500 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-lg">SPS Dashboard</h1>
                        <p class="text-xs text-indigo-300">Sistem Pelanggaran</p>
                    </div>
                </div>
                <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 rounded-lg hover:bg-indigo-700/50 transition-colors">
                    <i :class="sidebarOpen ? 'fa-angles-left' : 'fa-angles-right'" class="fas"></i>
                </button>
            </div>

            <!-- Menu Navigation -->
            <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-2">

                <!-- Dashboard -->
                <a href="/dashboard" wire:navigate @click="setActiveMenu('dashboard')"
                    :class="activeMenu === 'dashboard' ? 'bg-indigo-700 shadow-lg' : 'hover:bg-indigo-700/50'"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all group">
                    <i class="fas fa-chart-line text-amber-400 text-lg w-6"></i>
                    <span x-show="sidebarOpen" class="font-medium">Dashboard</span>
                </a>

                <!-- Master Data -->
                <div class="space-y-1">
                    <button @click="masterDataOpen = !masterDataOpen"
                        :class="activeMenu === 'guru' || activeMenu === 'siswa' || activeMenu === 'kelas' ||
                            activeMenu === 'pelanggaran-master' ? 'bg-indigo-700/50' : 'hover:bg-indigo-700/50'"
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
                        <a href="/master-data/data-guru" wire:navigate @click="setActiveMenu('guru')"
                            :class="activeMenu === 'guru' ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                            <i class="fas fa-chalkboard-teacher text-green-400 w-5"></i>
                            <span>Data Guru</span>
                        </a>
                        <a href="/master-data/data-siswa" wire:navigate @click="setActiveMenu('siswa')"
                            :class="activeMenu === 'siswa' ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                            <i class="fas fa-user-graduate text-cyan-400 w-5"></i>
                            <span>Data Siswa</span>
                        </a>
                        <a href="/master-data/data-kelas" wire:navigate @click="setActiveMenu('kelas')"
                            :class="activeMenu === 'kelas' ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                            <i class="fas fa-door-open text-purple-400 w-5"></i>
                            <span>Data Kelas</span>
                        </a>
                        <a href="/master-data/data-pelanggaran" wire:navigate
                            @click="setActiveMenu('pelanggaran-master')"
                            :class="activeMenu === 'pelanggaran-master' ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                            <i class="fas fa-exclamation-triangle text-red-400 w-5"></i>
                            <span>Data Pelanggaran</span>
                        </a>
                    </div>
                </div>

                <!-- Manajemen Pelanggaran -->
                <div class="space-y-1">
                    <button @click="pelanggaranOpen = !pelanggaranOpen"
                        :class="activeMenu === 'laporan' || activeMenu === 'konseling' || activeMenu === 'rekap' ?
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
                            @click="setActiveMenu('laporan')"
                            :class="activeMenu === 'laporan' ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                            <i class="fas fa-file-alt text-yellow-400 w-5"></i>
                            <span>Laporan Pelanggaran</span>
                        </a>
                        <a href="/management-pelanggaran/sesi-konseling" wire:navigate
                            @click="setActiveMenu('konseling')"
                            :class="activeMenu === 'konseling' ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                            <i class="fas fa-comments text-teal-400 w-5"></i>
                            <span>Sesi Konseling</span>
                        </a>
                        <a href="/management-pelanggaran/rekap-laporan" wire:navigate @click="setActiveMenu('rekap')"
                            :class="activeMenu === 'rekap' ? 'bg-indigo-700/70' : 'hover:bg-indigo-700/30'"
                            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all text-sm">
                            <i class="fas fa-chart-bar text-pink-400 w-5"></i>
                            <span>Rekap & Laporan</span>
                        </a>
                    </div>
                </div>

                <!-- Pengaturan Sistem -->
                <a href="/pengaturan-sitem/management-user" wire:navigate @click="setActiveMenu('user')"
                    :class="activeMenu === 'user' ? 'bg-indigo-700 shadow-lg' : 'hover:bg-indigo-700/50'"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all group">
                    <i class="fas fa-users-cog text-violet-400 text-lg w-6"></i>
                    <span x-show="sidebarOpen" class="font-medium">Manajemen User</span>
                </a>

            </nav>

            <!-- Footer Sidebar -->
            <div class="border-t border-indigo-700/50 p-4">
                <button
                    class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-red-600/20 transition-all group">
                    <i class="fas fa-sign-out-alt text-red-400 text-lg w-6"></i>
                    <span x-show="sidebarOpen" class="font-medium">Logout</span>
                </button>

                <div x-show="sidebarOpen" class="mt-4 px-4 py-3 bg-indigo-700/30 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-sm">Admin User</p>
                            <p class="text-xs text-indigo-300">Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area (Placeholder) -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            @yield('content')
        </main>

    </div>
</body>

</html>
