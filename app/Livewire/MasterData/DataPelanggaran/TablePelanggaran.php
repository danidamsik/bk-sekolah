<?php

namespace App\Livewire\MasterData\DataPelanggaran;

use App\Models\Violation;
use Livewire\Component;
use Livewire\WithPagination;

class TablePelanggaran extends Component
{
    use WithPagination;

    public function render()
    {
        $dataViolation = Violation::select('id', 'name', 'point', 'description')->paginate(10);
        
        return view('livewire.master-data.data-pelanggaran.table-pelanggaran', ['dataViolation' => $dataViolation]);
    }
}
