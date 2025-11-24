<aside :class="sidebarOpen ? 'w-72' : 'w-20'"
    class="bg-blue-900 text-white transition-all duration-300 flex flex-col shadow-2xl">
    <!-- Header Sidebar -->
    <div class="flex items-center justify-between p-6 border-b border-indigo-700/50">
        <div x-show="sidebarOpen" class="flex items-center space-x-3">
            <div
                class="w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-500 rounded-lg flex items-center justify-center shadow-lg">
                <i class="fas fa-graduation-cap text-white text-xl"></i>
            </div>
            <div>
                <h1 class="font-bold text-lg">SPS Dashboard</h1>
                <p class="text-xs text-indigo-300">Sistem Pelanggaran Siswa SMK Negeri 4</p>
            </div>
        </div>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-indigo-700/50 transition-colors">
            <i :class="sidebarOpen ? 'fa-angles-left' : 'fa-angles-right'" class="fas"></i>
        </button>
    </div>

    <!-- Menu Navigation -->
    <x-navigation />

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
