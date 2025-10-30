<?php

namespace App\Livewire\ManagementPelanggaran\SesiKonseling;

use Livewire\Component;

class FormSesiKonseling extends Component
{

    public $nama_siswa;
    public $nama_guru;
    public $session_date;
    public $status;
    public $id;
    public function render()
    {
        return view('livewire.management-pelanggaran.sesi-konseling.form-sesi-konseling');
    }
}
