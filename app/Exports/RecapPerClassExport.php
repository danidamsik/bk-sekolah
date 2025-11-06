<?php

namespace App\Exports;

use App\Models\ClassRoom;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RecapPerClassExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    /**
     * Ambil data collection
     */
    public function collection()
    {
        return ClassRoom::select(
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
    }

    /**
     * Headings untuk Excel
     */
    public function headings(): array
    {
        return [
            'No',
            'Kelas',
            'Jumlah Siswa Melanggar',
            'Total Pelanggaran',
            'Total Point'
        ];
    }

    /**
     * Mapping data untuk setiap baris
     */
    public function map($row): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $row->kelas,
            $row->jumlah_siswa_melanggar,
            $row->total_pelanggaran,
            $row->total_point
        ];
    }

    /**
     * Styling untuk Excel
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4472C4']
                ],
                'font' => [
                    'color' => ['rgb' => 'FFFFFF'],
                    'bold' => true
                ]
            ],
        ];
    }

    /**
     * Set lebar kolom
     */
    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 25,
            'C' => 25,
            'D' => 20,
            'E' => 15,
        ];
    }
}