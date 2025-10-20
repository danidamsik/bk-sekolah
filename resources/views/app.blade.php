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
</head>
<body class="h-full flex flex-col">

  <!-- Navbar -->
  <header class="bg-blue-600 text-white">
    <div class="flex items-center justify-between px-4 py-3">
      <div class="flex items-center space-x-2">
        <!-- Hamburger -->
        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden focus:outline-none">
          <span class="material-icons">menu</span>
        </button>
      </div>
      <div class="flex items-center justify-between space-x-3 w-full">
        <!-- Kiri -->
        <h1 class="font-bold text-lg ml-80">Sistem Pencatatan Pelanggaran Siswa</h1>
        <!-- Kanan -->
        <div class="flex items-center space-x-3">
            <span class="hidden md:inline">Admin</span>
            <img src="https://via.placeholder.com/32" alt="User" class="w-8 h-8 rounded-full">
        </div>
        </div>
    </div>
  </header>

  <div class="flex flex-1">
    <!-- Sidebar -->
    <aside 
      class="bg-white w-64 border-r border-gray-200 p-4 space-y-2 fixed inset-y-0 left-0 transform md:translate-x-0 transition-transform duration-200 ease-in-out z-40"
      :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
      @click.away="sidebarOpen = false"
        >
      <nav aria-label="Sidebar utama" class="space-y-2">
        <a href="/dashboard" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">dashboard</span> Dashboard
        </a>
        <a href="/note" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">note_add</span> Pencatatan Pelanggaran
        </a>
        <a href="/peple" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">people</span> Manajemen Siswa
        </a>
        <a href="/konseling" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">gavel</span> Tindak Lanjut & Konseling
        </a>
        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">manage_accounts</span> Manajemen Pengguna
        </a>
        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-blue-100">
          <span class="material-icons mr-2">settings</span> Pengaturan
        </a>
      </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="flex-1 p-6 md:ml-64">
      <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
      <section>
        <p class="text-gray-700">
          Selamat datang di Sistem Pencatatan Pelanggaran Siswa. Gunakan menu di sidebar untuk navigasi.
        </p>
      </section>
    </main>
  </div>
</body>
</html>
