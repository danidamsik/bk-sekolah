@extends('app')

@section('content')
    <div class="max-w-7xl mx-auto px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Card Statistik Contoh -->
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <span class="material-icons text-blue-600">school</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Siswa</p>
                        <p class="text-2xl font-bold text-gray-900">1,250</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="p-3 bg-red-100 rounded-full">
                        <span class="material-icons text-red-600">warning</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Pelanggaran Bulan Ini</p>
                        <p class="text-2xl font-bold text-gray-900">45</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-full">
                        <span class="material-icons text-green-600">check_circle</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Kasus Ditangani</p>
                        <p class="text-2xl font-bold text-gray-900">32</p>
                    </div>
                </div>
            </div>
        </div>
        <section class="bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Selamat Datang</h2>
            <p class="text-gray-600 leading-relaxed">
                Selamat datang di Sistem Pencatatan Pelanggaran Siswa. Gunakan menu di sidebar untuk navigasi
                dan kelola data dengan efisien.
            </p>
        </section>
    </div>
@endsection
