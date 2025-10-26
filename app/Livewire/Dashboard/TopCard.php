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

        // 2. Pelanggaran Bulan Ini
        $this->pelanggaranBulanIni = ViolationReport::whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->count();

        // 3. Siswa dengan Poin di Atas 50
        $this->siswaPoinTinggi = Student::where('total_points', '>', 50)->count();

        // 4. Kasus Selesai
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
