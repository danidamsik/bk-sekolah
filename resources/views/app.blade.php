<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false }" class="h-full bg-gradient-to-br from-gray-50 to-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pencatatan Pelanggaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="h-full flex flex-col font-sans">

    <!-- Navbar -->
    <header class="bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg">
        <div class="flex items-center justify-between px-6 py-4">
            <!-- Kiri: Hamburger -->
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="md:hidden focus:outline-none hover:bg-blue-500 rounded-lg p-2 transition-colors duration-200">
                    <span class="material-icons text-2xl">menu</span>
                </button>
            </div>

            <!-- Tengah: Judul -->
            <h1 class="font-bold text-xl flex-1 text-center hidden md:block">
                Sistem Pencatatan Pelanggaran Siswa
            </h1>

            <!-- Kanan: Profil -->
            <div class="flex items-center space-x-3">
                <span class="hidden md:inline text-sm font-medium">Admin</span>
                <i class="fa-solid fa-circle-user text-3xl text-white"></i>
            </div>
        </div>
    </header>


    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside
            class="bg-white w-64 border-r border-gray-200 p-6 space-y-3 fixed inset-y-0 left-0 transform md:translate-x-0 transition-transform duration-300 ease-in-out z-40 shadow-xl"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" @click.away="sidebarOpen = false">
            <nav aria-label="Sidebar utama" class="space-y-2">
                <a href="/dashboard"
                    class="flex items-center p-3 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-200 group">
                    <span class="material-icons mr-3 text-blue-600 group-hover:text-blue-700">dashboard</span>
                    <span class="font-medium text-gray-700 group-hover:text-gray-900">Dashboard</span>
                </a>
                <a href="/note"
                    class="flex items-center p-3 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-200 group">
                    <span class="material-icons mr-3 text-blue-600 group-hover:text-blue-700">note_add</span>
                    <span class="font-medium text-gray-700 group-hover:text-gray-900">Pencatatan Pelanggaran</span>
                </a>
                <a href="/peple"
                    class="flex items-center p-3 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-200 group">
                    <span class="material-icons mr-3 text-blue-600 group-hover:text-blue-700">people</span>
                    <span class="font-medium text-gray-700 group-hover:text-gray-900">Manajemen Siswa</span>
                </a>
                <a href="/konseling"
                    class="flex items-center p-3 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-200 group">
                    <span class="material-icons mr-3 text-blue-600 group-hover:text-blue-700">gavel</span>
                    <span class="font-medium text-gray-700 group-hover:text-gray-900">Tindak Lanjut & Konseling</span>
                </a>
                <a href="/manajemen"
                    class="flex items-center p-3 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-200 group">
                    <span class="material-icons mr-3 text-blue-600 group-hover:text-blue-700">manage_accounts</span>
                    <span class="font-medium text-gray-700 group-hover:text-gray-900">Manajemen Pengguna</span>
                </a>
                <a href="#"
                    class="flex items-center p-3 rounded-xl hover:bg-blue-50 hover:shadow-md transition-all duration-200 group">
                    <span class="material-icons mr-3 text-blue-600 group-hover:text-blue-700">settings</span>
                    <span class="font-medium text-gray-700 group-hover:text-gray-900">Pengaturan</span>
                </a>
            </nav>
        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-8 md:ml-64 bg-gray-50">
            
        </main>
    </div>
</body>

</html>
