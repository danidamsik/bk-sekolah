<!-- Tambahan Baru -->
<div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <svg class="w-8 h-8 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
            </path>
        </svg>
        Analisis Pelanggaran Kelas & Siswa
    </h2>

    <!-- Chart Section -->
    <div class="mb-8 bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
        <h3 class="text-lg font-semibold text-blue-800 mb-4 flex items-center">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                </path>
            </svg>
            Distribusi Pelanggaran
        </h3>
        <div id="chart"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Kelas dengan Jumlah Pelanggaran Tertinggi -->
        <div class="bg-gradient-to-br from-red-50 to-red-100 p-6 rounded-xl border border-red-200">
            <h3 class="text-lg font-semibold text-red-800 mb-4 flex items-center">
                <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                Kelas dengan Pelanggaran Tertinggi
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-red-300 bg-red-200">
                            <th class="py-3 px-4 font-semibold text-red-900">Kelas</th>
                            <th class="py-3 px-4 font-semibold text-red-900 text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([['kelas' => 'X IPA 1', 'jumlah' => 45], ['kelas' => 'XII IPS 2', 'jumlah' => 38], ['kelas' => 'XI IPA 3', 'jumlah' => 33], ['kelas' => 'X IPS 1', 'jumlah' => 29], ['kelas' => 'XII IPA 2', 'jumlah' => 25]] as $row)
                            <tr class="border-b border-red-200 hover:bg-red-50 transition-colors duration-200">
                                <td class="py-3 px-4 text-gray-700 font-medium flex items-center">
                                    <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    {{ $row['kelas'] }}
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <span
                                        class="font-bold text-white bg-red-500 rounded-full px-4 py-1 inline-block min-w-[3rem] text-center">
                                        {{ $row['jumlah'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Pelanggar -->
        <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200">
            <h3 class="text-lg font-semibold text-green-800 mb-4 flex items-center">
                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                Top Pelanggar
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-green-300 bg-green-200">
                            <th class="py-3 px-4 font-semibold text-green-900">Nama Siswa</th>
                            <th class="py-3 px-4 font-semibold text-green-900 text-right">Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([['nama' => 'Andi Saputra', 'poin' => 95], ['nama' => 'Siti Rahma', 'poin' => 88], ['nama' => 'Budi Prasetyo', 'poin' => 83], ['nama' => 'Rina Oktaviani', 'poin' => 79], ['nama' => 'Dimas Putra', 'poin' => 74]] as $siswa)
                            <tr class="border-b border-green-200 hover:bg-green-50 transition-colors duration-200">
                                <td class="py-3 px-4 text-gray-700 font-medium flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    {{ $siswa['nama'] }}
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <span
                                        class="font-bold text-white bg-green-500 rounded-full px-4 py-1 inline-block min-w-[3rem] text-center">
                                        {{ $siswa['poin'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var options = {
        series: [44, 55, 13, 43, 22],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Keterlambatan', 'Kerapian', 'Merokok', 'Perkelahian', 'Masalah Akademik'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
