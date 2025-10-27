<?php

namespace App\Livewire\MasterData\DataPelanggaran;

use App\Models\Violation;
use Livewire\Component;

class TablePelanggaran extends Component
{
    public $dataViolation;

    public function mount()
    {
        $this->dataViolation = Violation::select('id', 'name', 'point', 'description')->get();
    }
    public function render()
    {
        return view('livewire.master-data.data-pelanggaran.table-pelanggaran', ['dataViolation' => $this->dataViolation]);
    }
}
