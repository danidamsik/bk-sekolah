<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 border border-gray-100 shadow-lg">
        <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <i class="fas fa-chart-line text-indigo-500"></i> Grafik Pelanggaran per Bulan
        </h3>
        <div id="lineChart"></div>
    </div>

    <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 border border-gray-100 shadow-lg">
        <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <i class="fas fa-chart-pie text-rose-500"></i> Persentase Jenis Pelanggaran
        </h3>
        <div id="pieChart"></div>
    </div>
</div>

<script>
    const lineChart = new ApexCharts(document.querySelector("#lineChart"), {
                chart: {
                    type: 'line',
                    height: 320,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: 'Total Pelanggaran',
                    data: @json($pelanggaranPerBulan)
                }],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt',
                        'Nov', 'Des'
                    ]
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                colors: ['#6366f1'],
                grid: {
                    borderColor: '#f3f4f6'
                },
                markers: {
                    size: 4
                }
            });
            lineChart.render();

            // PIE CHART
            const pieChart = new ApexCharts(document.querySelector("#pieChart"), {
                chart: {
                    type: 'pie',
                    height: 320
                },
                series: @json($pieSeries),
                labels: ['Merokok', 'Berkelahi', 'Bolos', 'Melawan Guru', 'Merusak Fasilitas'],
                colors: ['#6366f1', '#f59e0b', '#ef4444', '#10b981'],
                legend: {
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: true
                }
            });
            pieChart.render();
</script>
