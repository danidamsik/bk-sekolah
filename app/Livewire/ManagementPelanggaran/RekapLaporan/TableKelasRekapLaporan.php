<?php

namespace App\Livewire\ManagementPelanggaran\RekapLaporan;

use Livewire\Component;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TableKelasRekapLaporan extends Component
{
    use WithPagination;

    public function render()
    {
        $recapPerClass = ClassRoom::select(
        'classes.id',
        'classes.name as kelas',
        DB::raw('COUNT(DISTINCT violation_reports.student_id) as jumlah_siswa_melanggar'),
        DB::raw('COUNT(violation_reports.id) as total_pelanggaran'),
        DB::raw('COALESCE(SUM(violations.point), 0) as total_point')
        )
        ->leftJoin('students', 'classes.id', '=', 'students.class_id')
        ->leftJoin('violation_reports', 'students.id', '=', 'violation_reports.student_id')
        ->leftJoin('violations', 'violation_reports.violation_id', '=', 'violations.id')
        ->groupBy('classes.id', 'classes.name')
        ->orderBy('total_point', 'DESC')
        ->paginate(10);

        return view('livewire.management-pelanggaran.rekap-laporan.table-kelas-rekap-laporan', ['recapPerClass' => $recapPerClass]);
    }
}
