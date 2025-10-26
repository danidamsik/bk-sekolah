<?php

namespace App\Livewire\Dashboard;

use App\Models\Violation;
use Livewire\Component;
use App\Models\ViolationReport;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Chart extends Component
{
    public $pelanggaranPerBulan = [], $pieSeries = [];
    public function mount() {

        $namaPelanggaran = ['Merokok', 'Berkelahi', 'Bolos', 'Melawan Guru', 'Merusak Fasilitas'];

        $results = ViolationReport::join('violations', 'violation_reports.violation_id', '=', 'violations.id')
            ->whereIn('violations.name', $namaPelanggaran)
            ->select('violations.name', DB::raw('COUNT(violation_reports.id) as total'))
            ->groupBy('violations.name')
            ->get()
            ->pluck('total', 'name')
            ->toArray();

        foreach ($namaPelanggaran as $nama) {
            $this->pieSeries[] = $results[$nama] ?? 0;
        }

        $year = Carbon::now()->year;

        $data = ViolationReport::selectRaw('MONTH(date) as bulan, COUNT(*) as total')
            ->whereYear('date', $year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        for ($i = 1; $i <= 12; $i++) {
            $this->pelanggaranPerBulan[] = $data[$i] ?? 0;
}
    }
    public function render()
    {
        return view('livewire.dashboard.chart', [
            'pelanggaranPerBulan' => $this->pelanggaranPerBulan,
            'pieSeries' => $this->pieSeries
        ]);
    }
}
