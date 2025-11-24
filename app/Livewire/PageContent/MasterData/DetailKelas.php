<?php

namespace App\Livewire\PageContent\MasterData;

use Livewire\Component;

class DetailKelas extends Component
{
    public $id;
    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        return view('livewire.page-content.master-data.detail-kelas');
    }
}
