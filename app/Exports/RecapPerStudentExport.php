<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RecapPerStudentExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $query = Student::select(
            'students.id',
            'students.name as nama_siswa',
            'students.nisn',
            'classes.name as kelas',
            DB::raw('COUNT(violation_reports.id) as total_pelanggaran'),
            DB::raw('COALESCE(SUM(violations.point), 0) as total_point')
        )
        ->join('classes', 'students.class_id', '=', 'classes.id')
        ->leftJoin('violation_reports', 'students.id', '=', 'violation_reports.student_id')
        ->leftJoin('violations', 'violation_reports.violation_id', '=', 'violations.id');
        return $query->groupBy('students.id', 'students.name', 'students.nisn', 'classes.name')
            ->orderBy('total_point', 'DESC')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'NISN',
            'Kelas',
            'Total Pelanggaran',
            'Total Point'
        ];
    }

    public function map($row): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $row->nama_siswa,
            $row->nisn,
            $row->kelas,
            $row->total_pelanggaran,
            $row->total_point
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                    'color' => ['rgb' => 'FFFFFF']
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4472C4']
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                ]
            ],
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 8,   
            'B' => 30,  
            'C' => 20,  
            'D' => 15, 
            'E' => 20,  
            'F' => 15,  
        ];
    }

    public function title(): string
    {
        return 'Rekap Per Siswa';
    }
}