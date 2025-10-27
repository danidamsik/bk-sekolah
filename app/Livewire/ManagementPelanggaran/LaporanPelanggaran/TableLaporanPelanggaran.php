<?php

namespace App\Livewire\ManagementPelanggaran\LaporanPelanggaran;

use Livewire\Component;
use App\Models\ViolationReport;
use Livewire\WithPagination;

class TableLaporanPelanggaran extends Component
{
    use WithPagination;
    
    public function render()
    {
        $violationReport = ViolationReport::select(
            'students.name as nama_siswa',
            'classes.name as class_name',
            'violations.name as name_pelanggaran',
            'teachers.name as name_teacher',
            'violation_reports.date',
            'violation_reports.status'
        )->join('students', 'violation_reports.student_id', '=', 'students.id')
        ->join('classes', 'students.class_id', '=', 'classes.id')
        ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
        ->join('teachers', 'violation_reports.teacher_id', '=', 'teachers.id')->paginate(10);

        return view('livewire.management-pelanggaran.laporan-pelanggaran.table-laporan-pelanggaran', ['violationReport' => $violationReport]);
    }
}
