<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Modal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div x-data="{
        isOpen: false,
        selectedUser: '',
        oldPassword: '',
        newPassword: '',
        confirmPassword: '',
        showOldPassword: false,
        showNewPassword: false,
        showConfirmPassword: false,
        users: [
            { id: 1, name: 'Ahmad Rizki' },
            { id: 2, name: 'Siti Nurhaliza' },
            { id: 3, name: 'Budi Santoso' },
            { id: 4, name: 'Dewi Lestari' }
        ]
    }">

        <!-- Tombol untuk membuka modal -->
        <button @click="isOpen = true"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition duration-200">
            Reset Password
        </button>

       

    </div>

</body>

</html>
