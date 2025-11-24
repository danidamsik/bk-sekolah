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

@script
<script>
    let lineChartInstance = null;
    let pieChartInstance = null;

    function initLineChart() {
        const chartEl = document.querySelector("#lineChart");
        if (!chartEl) return;

        // Hancurkan chart sebelumnya jika ada
        if (lineChartInstance) {
            lineChartInstance.destroy();
        }

        const seriesData = @json($pelanggaranPerBulan);

        lineChartInstance = new ApexCharts(chartEl, {
            chart: {
                type: 'line',
                height: 320,
                toolbar: { show: false }
            },
            series: [{
                name: 'Total Pelanggaran',
                data: seriesData
            }],
            xaxis: {
                categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            colors: ['#6366f1'],
            grid: { borderColor: '#f3f4f6' },
            markers: { size: 4 }
        });

        lineChartInstance.render();
    }

    function initPieChart() {
        const chartEl = document.querySelector("#pieChart");
        if (!chartEl) return;

        // Hancurkan chart sebelumnya jika ada
        if (pieChartInstance) {
            pieChartInstance.destroy();
        }

        const seriesData = @json($pieSeries);

        pieChartInstance = new ApexCharts(chartEl, {
            chart: {
                type: 'pie',
                height: 320
            },
            series: seriesData,
            labels: ['Merokok', 'Berkelahi', 'Bolos', 'Melawan Guru', 'Merusak Fasilitas'],
            colors: ['#6366f1', '#f59e0b', '#ef4444', '#10b981', '#3b82f6'],
            legend: { position: 'bottom' },
            dataLabels: { enabled: true }
        });

        pieChartInstance.render();
    }

    // Inisialisasi pertama kali
    initLineChart();
    initPieChart();
</script>
@endscript
