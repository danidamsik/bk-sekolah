<?php

namespace App\Livewire\ManagementPelanggaran\LaporanPelanggaran;

use Livewire\Component;

class FormLaporanPelanggaran extends Component
{


    public $id;
    public $nama_siswa;
    public $class_name;
    public $name_pelanggaran;
    public $name_teacher;
    public $date;
    public $status;
    
    public function render()
    {
        return view('livewire.management-pelanggaran.laporan-pelanggaran.form-laporan-pelanggaran');
    }
}
