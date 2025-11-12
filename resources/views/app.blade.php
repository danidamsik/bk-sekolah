<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Pelanggaran Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        [x-cloak] {
            display: none !important;
        }

        @keyframes slideInBounce {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }

            60% {
                transform: translateX(-10px);
                opacity: 1;
            }

            80% {
                transform: translateX(5px);
            }

            100% {
                transform: translateX(0);
            }
        }

        @keyframes slideOut {
            0% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }

            100% {
                transform: translateX(120%) scale(0.9);
                opacity: 0;
            }
        }

        .toast-enter {
            animation: slideInBounce 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .toast-leave {
            animation: slideOut 0.4s cubic-bezier(0.4, 0, 1, 1);
        }

        .progress-bar {
            animation: progress 5s linear;
        }

        @keyframes progress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }

        .icon-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .7;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <div x-data="{
        sidebarOpen: true,
        masterDataOpen: $persist(false).as('masterDataOpen'),
        pelanggaranOpen: $persist(false).as('pelanggaranOpen'),
        activeMenu: 'dashboard',
        currentPath: window.location.pathname,
    
        // Function to get active menu from current path
        getActiveMenu() {
            const path = this.currentPath;
            if (path === '/dashboard' || path === '/') {
                return 'dashboard';
            } else if (path.includes('data-guru')) {
                return 'guru';
            } else if (path.includes('data-siswa')) {
                return 'siswa';
            } else if (path.includes('data-kelas')) {
                return 'kelas';
            } else if (path.includes('data-pelanggaran')) {
                return 'pelanggaran-master';
            } else if (path.includes('laporan-pelanggaran')) {
                return 'laporan';
            } else if (path.includes('sesi-konseling')) {
                return 'konseling';
            } else if (path.includes('rekap-laporan')) {
                return 'rekap';
            } else if (path.includes('management-user')) {
                return 'user';
            }
            return 'dashboard';
        },
    
        // Check if menu is active
        isMenuActive(menu) {
            return this.getActiveMenu() === menu;
        }
    }" x-init="// Function to update path and submenus
    const updateNavigation = () => {
        currentPath = window.location.pathname;
        const path = currentPath;
    
        // Auto open/close submenus based on current path
        if (path.includes('/master-data')) {
            masterDataOpen = true;
        } else if (path.includes('/management-pelanggaran')) {
            pelanggaranOpen = true;
        }
    };
    
    // Set on initial load
    updateNavigation();
    
    // Listen for Livewire navigation
    document.addEventListener('livewire:navigated', () => {
        updateNavigation();
    });" class="flex h-screen overflow-hidden">

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

            <!-- Footer Sidebar -->
            <div class="border-t border-indigo-700/50 p-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-red-600/20 transition-all group">
                        <i class="fas fa-sign-out-alt text-red-400 text-lg w-6"></i>
                        <span x-show="sidebarOpen" class="font-medium">Logout</span>
                    </button>
                </form>

                <div x-show="sidebarOpen" class="mt-4 px-4 py-3 bg-indigo-700/30 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-sm">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-indigo-300">{{ Auth::user()->role }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area (Placeholder) -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            @yield('content')
        </main>

        <div x-cloak x-show="$store.notif.open" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-full" role="alert"
            class="fixed top-6 right-6 w-80 rounded-2xl bg-white p-5 shadow-xl border border-gray-100 backdrop-blur-sm bg-white/95 z-50">

            <div class="flex items-start gap-3">
                <!-- Icon dengan background melingkar -->
                <div class="flex-shrink-0 mt-0.5">
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-r from-green-400 to-emerald-500 flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <!-- Konten notifikasi -->
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-gray-900 text-sm mb-1">Berhasil!</p>
                    <p x-text="$store.notif.messege" class="text-gray-600 text-sm leading-relaxed"></p>
                </div>

                <!-- Tombol tutup -->
                <button @click="$store.notif.open = false"
                    class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors duration-200 rounded-full hover:bg-gray-100 p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Toast Notification -->
        <div x-cloak x-show="$store.notifToast.open" x-transition:enter="toast-enter"
            x-transition:leave="toast-leave"
            class="max-w-md w-full bg-white shadow-2xl rounded-2xl overflow-hidden fixed top-6 right-6 z-50">

            <!-- Progress Bar -->
            <div class="h-1 bg-gray-100">
                <div x-show="$store.notifToast.open" class="h-full bg-red-500 progress-bar"></div>
            </div>

            <!-- Content -->
            <div class="p-5 flex items-start gap-4">
                <!-- Icon dengan background -->
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-red-100">
                        <i class="fas fa-exclamation-circle text-red-500 text-xl icon-pulse"></i>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="flex-1 pt-1">
                    <p class="text-sm font-bold text-gray-900 mb-1">Akses Ditolak</p>
                    <p x-text="$store.notifToast.messege" class="text-sm text-gray-600 leading-relaxed"></p>
                </div>

                <!-- Close Button -->
                <button @click="$store.notifToast.open = false"
                    class="flex-shrink-0 w-8 h-8 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-all duration-200 flex items-center justify-center group">
                    <i class="fas fa-times group-hover:rotate-90 transition-transform duration-200"></i>
                </button>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('alpine:init', () => {

            Alpine.store('notif', {
                open: false,
                messege: '',
            })

            Alpine.store('notifToast', {
                open: false,
                messege: '',
            })
        })

        document.addEventListener('livewire:init', () => {
            Livewire.on('succses-notif', (messege) => {
                Alpine.store('notif').open = true
                Alpine.store('notif').messege = messege.messege

                setTimeout(() => {
                    Alpine.store('notif').open = false
                }, 2000);
            })

            Livewire.on('toast', (messege) => {
                Alpine.store('notifToast').open = true
                Alpine.store('notifToast').messege = messege.messege

                setTimeout(() => {
                    Alpine.store('notifToast').open = false
                }, 4900);
            })
        })
    </script>
</body>

</html>
