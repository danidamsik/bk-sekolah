<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

class TopKelas extends Component
{
    public $topKelas;
    public function mount() {
        $this->topKelas =Classroom::select(
                'classes.id',
                'classes.name as nama_kelas',
                'teachers.name as wali_kelas',
                DB::raw('COUNT(DISTINCT students.id) as jumlah_siswa'),
                DB::raw('COUNT(violation_reports.id) as total_pelanggaran'),
                DB::raw('COALESCE(ROUND(SUM(violations.point) / COUNT(DISTINCT students.id), 2), 0) as rata_rata_poin_per_siswa')
            )
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->join('students', 'classes.id', '=', 'students.class_id')
            ->leftJoin('violation_reports', 'students.id', '=', 'violation_reports.student_id')
            ->leftJoin('violations', 'violation_reports.violation_id', '=', 'violations.id')
            ->groupBy('classes.id', 'classes.name', 'teachers.name')
            ->orderByDesc('total_pelanggaran')
            ->limit(10)
            ->get();
    }
    public function render()
    {
        return view('livewire.dashboard.top-kelas', ['topKelas' => $this->topKelas]);
    }
}
