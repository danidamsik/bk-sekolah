<?php

namespace App\Livewire\MasterData\DataSiswa;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TableSiswa extends Component
{
    public $dataSiswa;

    public function mount() {

        $this->dataSiswa = Student::select(
            'students.id',
            'students.nisn',
            'students.name',
            'classes.name as nama_kelas',
            'teachers.name as wali_kelas',
            DB::raw('SUM(violations.point) as total_point'),
            'students.parent_name',
            'students.parent_contact'
        )
        ->join('classes', 'students.class_id', '=', 'classes.id')
        ->join('teachers', 'students.teacher_id', '=', 'teachers.id')
        ->join('violation_reports', 'students.id', '=', 'violation_reports.student_id')
        ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
        ->groupBy(
            'students.id',
            'students.nisn',
            'students.name',
            'classes.name',
            'teachers.name',
            'students.parent_name',
            'students.parent_contact'
        )
        ->get();
    }

    public function render()
    {
        return view('livewire.master-data.data-siswa.table-siswa', ['dataSiswa' => $this->dataSiswa]);
    }
}
