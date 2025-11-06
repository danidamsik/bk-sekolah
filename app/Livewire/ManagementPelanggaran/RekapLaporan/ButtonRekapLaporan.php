<?php

namespace App\Livewire\ManagementPelanggaran\RekapLaporan;

use Livewire\Component;
use App\Exports\RecapPerClassExport;
use Maatwebsite\Excel\Facades\Excel;

class ButtonRekapLaporan extends Component
{
    public function downloadExcel()
    {
        $fileName = 'rekap_pelanggaran_per_kelas_' . date('Y-m-d_His') . '.xlsx';

        return response()->streamDownload(function () {
            echo Excel::raw(new RecapPerClassExport, \Maatwebsite\Excel\Excel::XLSX);
        }, $fileName);
    }

    public function render()
    {
        return view('livewire.management-pelanggaran.rekap-laporan.button-rekap-laporan');
    }
}
