<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Student;
use App\Models\ViolationReport;
use Carbon\Carbon;

class TopCard extends Component
{
    public $totalSiswa, $pelanggaranBulanIni, $siswaPoinTinggi, $kasusSelesai, $kasusTerbaru;
    
    public function mount() {
        $this->totalSiswa = Student::count();

        $this->pelanggaranBulanIni = ViolationReport::whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->count();

        $this->siswaPoinTinggi = Student::join('violation_reports', 'students.id', '=', 'violation_reports.student_id')
                ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
                ->select('students.id')
                ->groupBy('students.id')
                ->havingRaw('SUM(violations.point) > 50')
                ->count();

        $this->kasusSelesai = ViolationReport::where('status', 'Selesai')->count();

       $this->kasusTerbaru = ViolationReport::whereDate('date', Carbon::today())->count();

    }
    public function render()
    {
        return view('livewire.dashboard.top-card', [
            'totalSiswa' => $this->totalSiswa,
            'pelanggaranBulanIni' => $this->pelanggaranBulanIni,
            'siswaPoinTinggi' => $this->siswaPoinTinggi,
            'kasusSelesai' => $this->kasusSelesai,
            'kasusTerbaru' => $this->kasusTerbaru,
        ]);
    }
}
