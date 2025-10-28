<?php

namespace App\Livewire\ManagementPelanggaran\RekapLaporan;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TableSiswaRekapLaporan extends Component
{
    public $recapPerStudent;
    
    public function mount()
    {
        $this->recapPerStudent = Student::select(
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
        ->get();
        }
    
    public function render()
    {
        return view('livewire.management-pelanggaran.rekap-laporan.table-siswa-rekap-laporan', ['recapPerStudent' => $this->recapPerStudent]);
    }
}
