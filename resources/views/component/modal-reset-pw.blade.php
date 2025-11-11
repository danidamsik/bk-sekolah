<!-- Modal Reset Password dengan Error Messages -->
<div x-cloak x-show="$wire.isOpen" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">

    <!-- Modal Content -->
    <div x-show="$wire.isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="bg-white rounded-xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">

        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4 rounded-t-xl">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-key"></i>
                    Reset Password
                </h2>
                <button @click="$wire.isOpen=false" class="text-white hover:text-gray-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="p-6 space-y-5">

            <!-- Pilih User -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Pilih User <span class="text-red-500">*</span>
                </label>
                <select wire:model="user_id"
                    class="w-full px-4 py-2.5 border @error('user_id') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    <option value="">-- Pilih User --</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password Lama -->
            <div x-data="{ showOldPw: false }">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Password Lama <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input :type="showOldPw ? 'text' : 'password'" wire:model="old_pw" placeholder="Masukkan password lama"
                        class="w-full px-4 py-2.5 pr-12 border @error('old_pw') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    <button type="button" @click="showOldPw = !showOldPw" 
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                        <i :class="showOldPw ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                    </button>
                </div>
                @error('old_pw')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password Baru -->
            <div x-data="{ showNewPw: false }">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Password Baru <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input :type="showNewPw ? 'text' : 'password'" wire:model="new_pw" placeholder="Masukkan password baru"
                        class="w-full px-4 py-2.5 pr-12 border @error('new_pw') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    <button type="button" @click="showNewPw = !showNewPw" 
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                        <i :class="showNewPw ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                    </button>
                </div>
                @error('new_pw')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}
                    </p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">
                    <i class="fa-solid fa-info-circle"></i>
                    Minimal 8 karakter, harus mengandung huruf besar, huruf kecil, angka, dan simbol
                </p>
            </div>

            <!-- Konfirmasi Password -->
            <div x-data="{ showConfirPw: false }">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Konfirmasi Password <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input :type="showConfirPw ? 'text' : 'password'" wire:model="confir_pw" placeholder="Konfirmasi password baru"
                        class="w-full px-4 py-2.5 pr-12 border @error('confir_pw') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    <button type="button" @click="showConfirPw = !showConfirPw" 
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                        <i :class="showConfirPw ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                    </button>
                </div>
                @error('confir_pw')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-4 bg-gray-50 rounded-b-xl flex justify-end space-x-3">
            <button @click="$wire.isOpen = false;"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-not-allowed"
                class="px-5 py-2.5 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition">
                <i class="fa-solid fa-times mr-1"></i>
                Batal
            </button>
            <button wire:click="resetPassword" 
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-not-allowed"
                class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition shadow-md hover:shadow-lg flex items-center gap-2">
                <span wire:loading.remove wire:target="resetPassword">
                    <i class="fa-solid fa-check"></i>
                    Reset Password
                </span>
                <span wire:loading wire:target="resetPassword" class="flex items-center gap-2">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                    Memproses...
                </span>
            </button>
        </div>

    </div>
</div>