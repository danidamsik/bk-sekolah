<?php

namespace App\Livewire\MasterData\DataSiswa;

use Livewire\Component;

class FormSiswa extends Component
{

    public $id;
    public $name;
    public $nisn;
    public $nama_kelas;
    public $wali_kelas;
    public $total_point;
    public $parent_name;
    public $parent_contact;

    public function render()
    {
        return view('livewire.master-data.data-siswa.form-siswa');
    }
}
