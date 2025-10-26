<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Student;
use App\Models\ViolationReport;
use App\Models\CounselingSession;
use Carbon\Carbon;

class TopCard extends Component
{
    public $totalSiswa, $pelanggaranBulanIni, $siswaPoinTinggi, $kasusSelesai, $kasusTerbaru;
    public function mount() {
        $this->totalSiswa = Student::count();

        $this->pelanggaranBulanIni = ViolationReport::whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->count();

        $this->siswaPoinTinggi = Student::where('total_points', '>', 50)->count();

        $this->siswaPoinTinggiDetail = Student::where('total_points', '>', 50)
            ->with(['class', 'teacher'])
            ->get();

        $this->kasusSelesai = ViolationReport::where('status', 'Selesai')->count();

        $this->kasusSelesaiBulanIni = ViolationReport::where('status', 'Selesai')
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->count();

        $this->kasusTerbaru = ViolationReport::with([
                'student',
                'violation',
                'reporter'
            ])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $this->kasusTerbaruHariIni = ViolationReport::with([
                'student',
                'violation',
                'reporter'
            ])
            ->whereDate('date', Carbon::today())
            ->orderBy('time', 'desc')
            ->get();

    }
    public function render()
    {
        return view('livewire.dashboard.top-card', [
            'totalSiswa' => $this->totalSiswa,
            'pelanggaranBulanIni' => $this->pelanggaranBulanIni,
            'siswaPoinTinggi' => $this->siswaPoinTinggi,
            'siswaPoinTinggiDetail' => $this->siswaPoinTinggiDetail,
            'kasusSelesai' => $this->kasusSelesai,
            'kasusSelesaiBulanIni' => $this->kasusSelesaiBulanIni,
            'kasusTerbaru' => $this->kasusTerbaru,
            'kasusTerbaruHariIni' => $this->kasusTerbaruHariIni,
        ]);
    }
}
