<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>
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

        <x-sidebar />

        <main class="flex-1 overflow-y-auto bg-gray-50">
            {{ $slot }}
        </main>

        <x-notification />

        <x-toast />

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
