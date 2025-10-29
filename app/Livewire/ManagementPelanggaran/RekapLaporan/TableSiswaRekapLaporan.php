<?php

namespace App\Livewire\ManagementPelanggaran\RekapLaporan;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TableSiswaRekapLaporan extends Component
{
    use WithPagination;
    
    public function render()
    {
        $recapPerStudent = Student::select(
        'students.id',
        'students.name as nama_siswa',
        'classes.name as kelas',
        DB::raw('COUNT(violation_reports.id) as total_pelanggaran'),
        DB::raw('SUM(violations.point) as total_point')
        )
        ->join('classes', 'students.class_id', '=', 'classes.id')
        ->leftJoin('violation_reports', 'students.id', '=', 'violation_reports.student_id')
        ->leftJoin('violations', 'violation_reports.violation_id', '=', 'violations.id')
        ->groupBy('students.id', 'students.name', 'students.nisn', 'classes.name')
        ->orderBy('total_point', 'DESC')
        ->paginate(10);

        return view('livewire.management-pelanggaran.rekap-laporan.table-siswa-rekap-laporan', ['recapPerStudent' => $recapPerStudent]);
    }
}
