<div x-cloak x-show="$store.notifToast.open" x-transition:enter="toast-enter" x-transition:leave="toast-leave"
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
