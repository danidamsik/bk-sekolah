<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem BK Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .input-focus:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .pattern-bg {
            background-color: #f8fafc;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(118, 75, 162, 0.05) 0%, transparent 50%);
        }
    </style>
</head>

<body class="pattern-bg min-h-screen flex items-center justify-center p-4">
    
    <div class="w-full max-w-6xl grid md:grid-cols-2 gap-8 items-center">
        
        <!-- Left Side - Illustration -->
        <div class="hidden md:flex flex-col items-center justify-center space-y-6">
            <div class="floating">
                <div class="w-64 h-64 gradient-bg rounded-full flex items-center justify-center shadow-2xl">
                    <i class="fas fa-user-graduate text-white text-8xl"></i>
                </div>
            </div>
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Sistem BK Sekolah</h1>
                <p class="text-lg text-gray-600">Pencatatan & Monitoring Pelanggaran Siswa</p>
            </div>
            <div class="flex items-center space-x-8 mt-4">
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-2">
                        <i class="fas fa-clipboard-list text-purple-600 text-2xl"></i>
                    </div>
                    <p class="text-sm text-gray-600">Pencatatan</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-2">
                        <i class="fas fa-chart-line text-indigo-600 text-2xl"></i>
                    </div>
                    <p class="text-sm text-gray-600">Laporan</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                        <i class="fas fa-bell text-blue-600 text-2xl"></i>
                    </div>
                    <p class="text-sm text-gray-600">Notifikasi</p>
                </div>
            </div>
        </div>

        <!-- START COMPONENT: Login Form -->
        @livewire('form-login')
        <!-- END COMPONENT: Login Form -->

    </div>

    <script>
        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });

        // Form Submission Handler
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;

            // Simulasi login (ganti dengan logic sebenarnya)
            console.log('Login attempt:', { username, password, remember });
            
            // Tampilkan loading atau redirect ke dashboard
            alert('Login berhasil! (Ini hanya simulasi)');
        });

        // Input Animation
        const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-102');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-102');
            });
        });
    </script>

</body>

</html>