<?php

namespace App\Livewire\MasterData\DataPelanggaran;

use Livewire\Component;

class FormPelanggaran extends Component
{

    public $name;
    public $id;
    public $point;
    public $description;
    public function render()
    {
        return view('livewire.master-data.data-pelanggaran.form-pelanggaran');
    }
}
