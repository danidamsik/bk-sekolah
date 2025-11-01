<?php

namespace App\Livewire\MasterData\DataPelanggaran;

use Livewire\Component;
use App\Models\Violation;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class TablePelanggaran extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        Violation::find($id)->delete();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('succses-notif')]
    public function render()
    {
        $query = Violation::select('id', 'name', 'point', 'description');

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $dataViolation = $query->paginate(10);

        return view('livewire.master-data.data-pelanggaran.table-pelanggaran', [
            'dataViolation' => $dataViolation,
        ]);
    }
}
