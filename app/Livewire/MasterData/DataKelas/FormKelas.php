<?php

namespace App\Livewire\MasterData\DataKelas;

use Livewire\Component;

class FormKelas extends Component
{    

    public $id;
    public $nama_kelas;
    public $wali_kelas;
    public $jumlah_siswa;
    
    public function render()
    {
        return view('livewire.master-data.data-kelas.form-kelas');
    }
}
