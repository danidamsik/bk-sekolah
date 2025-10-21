<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false }" class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Pencatatan Pelanggaran</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="h-full flex flex-col">
  <!-- Navbar -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-blue-600 text-white shadow-md h-16">
    <div class="flex items-center justify-between px-4 py-3">
      <div class="flex items-center space-x-2">
        <!-- Hamburger -->
        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden focus:outline-none">
          <span class="material-icons">menu</span>
        </button>
      </div>
      <div class="flex items-center justify-between space-x-3 w-full">
        <!-- Tengah -->
        <h1 class="font-bold text-lg text-center md:text-left">Sistem Pencatatan Pelanggaran Siswa</h1>
        <!-- Kanan -->
        <div class="flex items-center space-x-3">
          <span class="hidden md:inline">Admin</span>
          <i class="fa-solid fa-circle-user text-3xl text-white"></i>
        </div>
      </div>
    </div>
  </header>

  <div class="flex flex-1">
    <!-- Sidebar -->
    <aside
      class="bg-white top-16 w-64 border-r border-gray-200 p-4 space-y-2 fixed inset-y-0 left-0 transform md:translate-x-0 transition-transform duration-200 ease-in-out z-40"
      :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" @click.away="sidebarOpen = false">
      <nav aria-label="Sidebar utama" class="space-y-2">
        <a href="/dashboard" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">dashboard</span> Dashboard
        </a>
        <a href="/pelanggaran" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">note_add</span> Pencatatan Pelanggaran
        </a>
        <a href="/management-siswa" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">people</span> Manajemen Siswa
        </a>
        <a href="/konseling" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">gavel</span> Tindak Lanjut & Konseling
        </a>
        <a href="management-user" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">manage_accounts</span> Manajemen Pengguna
        </a>
        <a href="/settings" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">settings</span> Pengaturan
        </a>
      </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="flex-1 pt-20 px-6 md:ml-64">
      @yield('content')
    </main>
  </div>

</body>

</html>