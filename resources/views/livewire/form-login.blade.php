<div class="w-full max-w-md mx-auto">
    <div class="glass-effect rounded-2xl shadow-2xl p-8 md:p-10">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-block p-4 gradient-bg rounded-full mb-4">
                <i class="fas fa-shield-alt text-white text-3xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
            <p class="text-gray-600">Silakan login untuk melanjutkan</p>
        </div>

        <!-- Login Form -->
        <form id="loginForm" class="space-y-6">
            <!-- Username/Email Input -->
            <div>
                <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-user mr-2 text-gray-500"></i>Username atau Email
                </label>
                <input type="text" id="username" name="username" placeholder="Masukkan username atau email"
                    class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none transition-all duration-300"
                    required>
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-lock mr-2 text-gray-500"></i>Password
                </label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Masukkan password"
                        class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none transition-all duration-300 pr-12"
                        required>
                    <button type="button" id="togglePassword"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" id="remember"
                        class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>
                <a href="#" class="text-sm text-purple-600 hover:text-purple-700 font-medium">
                    Lupa password?
                </a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="btn-gradient w-full py-3 px-4 text-white font-semibold rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                <i class="fas fa-sign-in-alt mr-2"></i>Login
            </button>
        </form>

        <!-- Footer -->
        <!-- Additional Info -->
        <div class="mt-6 text-center text-sm text-gray-600">
            <p>© 2025 Sistem BK Sekolah. All rights reserved.</p>
        </div>
    </div>


</div>
