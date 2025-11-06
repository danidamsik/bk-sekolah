<?php

namespace App\Livewire\MasterData\DataKelas\DetailKelas;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TableKelas extends Component
{
    public $students;
    
    public function mount($classId)
    {
        $this->students = Student::leftJoin('violation_reports', 'students.id', '=', 'violation_reports.student_id')
            ->leftJoin('violations', 'violation_reports.violation_id', '=', 'violations.id')
            ->select(
                'students.id',
                'students.nisn',
                'students.name',
                DB::raw('COALESCE(SUM(violations.point), 0) as total_point')
            )
            ->where('students.class_id', $classId)
            ->groupBy('students.id', 'students.nisn', 'students.name')
            ->get();
    }
    public function render()
    {
        return view('livewire.master-data.data-kelas.detail-kelas.table-kelas');
    }
}
