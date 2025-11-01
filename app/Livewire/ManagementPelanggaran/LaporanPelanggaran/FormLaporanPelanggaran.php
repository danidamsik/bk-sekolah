<?php

namespace App\Livewire\ManagementPelanggaran\LaporanPelanggaran;

use App\Models\ClassRoom;
use App\Models\Teacher;
use Livewire\Component;

class FormLaporanPelanggaran extends Component
{
    public $id, $nama_siswa, $class_name, $name_pelanggaran, $name_teacher, $date, $status;
    public $kelas, $guru;

    public function mount()
    {
        $this->kelas = ClassRoom::select('id', 'name')->get();
        $this->guru = Teacher::select('id', 'name')->get(); 
    }

    public function createOrUpdate()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.management-pelanggaran.laporan-pelanggaran.form-laporan-pelanggaran', [
            'kelas' => $this->kelas,
            'guru' => $this->guru
        ]);
    }
}
