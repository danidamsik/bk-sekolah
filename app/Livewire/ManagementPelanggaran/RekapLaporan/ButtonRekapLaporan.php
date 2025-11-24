<?php

namespace App\Livewire\ManagementPelanggaran\RekapLaporan;

use Livewire\Component;
use App\Models\ClassRoom;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Exports\RecapPerClassExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RecapPerStudentExport;

class ButtonRekapLaporan extends Component
{
    public function downloadExcelKelas()
    {
        $fileName = 'rekap_pelanggaran_per_kelas_' . date('Y-m-d_His') . '.xlsx';

        return response()->streamDownload(function () {
            echo Excel::raw(new RecapPerClassExport, \Maatwebsite\Excel\Excel::XLSX);
        }, $fileName);
    }

    public function downloadExcelSiswa()
    {
        $fileName = 'rekap_pelanggaran_per_siswa_' . date('Y-m-d_His') . '.xlsx';

        return response()->streamDownload(function () {
            echo Excel::raw(new RecapPerStudentExport(), \Maatwebsite\Excel\Excel::XLSX);
        }, $fileName);
    }

    public function downloadPdfKelas()
    {
        $data = ClassRoom::select(
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
        ->get();

        $pdfData = [
            'data' => $data,
            'periode' => null
        ];

        $pdf = Pdf::loadView('pdf-download.recap-kelas-pdf', $pdfData);
        $pdf->setPaper('A4', 'portrait');

        $fileName = 'rekap_pelanggaran_per_kelas_' . date('Y-m-d_His') . '.pdf';

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $fileName);
    }

    public function downloadPdfSiswa()
    {
        $data = DB::table('students')
            ->select(
                'students.id',
                'students.name as nama_siswa',
                'classes.name as kelas',
                DB::raw('COUNT(violation_reports.id) as total_pelanggaran'),
                DB::raw('COALESCE(SUM(violations.point), 0) as total_point')
            )
            ->leftJoin('classes', 'students.class_id', '=', 'classes.id')
            ->leftJoin('violation_reports', 'students.id', '=', 'violation_reports.student_id')
            ->leftJoin('violations', 'violation_reports.violation_id', '=', 'violations.id')
            ->groupBy('students.id', 'students.name', 'classes.name')
            ->orderBy('total_point', 'DESC')
            ->get();

        $pdfData = [
            'data' => $data,
            'periode' => null
        ];

        $pdf = Pdf::loadView('pdf-download.recap-siswa-pdf', $pdfData);
        $pdf->setPaper('A4', 'portrait');

        $fileName = 'rekap_pelanggaran_per_siswa_' . date('Y-m-d_His') . '.pdf';

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $fileName);
    }

    public function render()
    {
        return view('livewire.management-pelanggaran.rekap-laporan.button-rekap-laporan');
    }
}
