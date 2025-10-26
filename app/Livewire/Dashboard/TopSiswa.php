<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class TopSiswa extends Component
{
    public $topSiswa;
    public function mount() {
        $this->topSiswa = Student::select(
        'students.name',
        'classes.name as class_name',
        DB::raw('SUM(violations.point) as total_point'),
        DB::raw('COUNT(violation_reports.id) as jml_pelanggaran')
        )
        ->join('classes', 'students.class_id', '=', 'classes.id')
        ->join('violation_reports', 'students.id', '=', 'violation_reports.student_id')
        ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
        ->groupBy('students.id', 'students.name', 'classes.name')
        ->orderByDesc('total_point')
        ->limit(10)
        ->get();
    }
    public function render()
    {
        return view('livewire.dashboard.top-siswa', ['topSiswa' => $this->topSiswa]);
    }
}
