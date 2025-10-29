<?php

namespace App\Livewire\MasterData\DataPelanggaran;

use App\Models\Violation;
use Livewire\Component;
use Livewire\WithPagination;

class TablePelanggaran extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Violation::select('id', 'name', 'point', 'description');

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $dataViolation = $query->paginate(5);

        return view('livewire.master-data.data-pelanggaran.table-pelanggaran', [
            'dataViolation' => $dataViolation,
        ]);
    }
}
