<?php

namespace App\Livewire\ManagementPelanggaran\RekapLaporan;

use Livewire\Component;
use App\Exports\RecapPerClassExport;
use App\Exports\RecapPerStudentExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function render()
    {
        return view('livewire.management-pelanggaran.rekap-laporan.button-rekap-laporan');
    }
}
