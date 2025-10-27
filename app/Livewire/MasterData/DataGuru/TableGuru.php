<?php

namespace App\Livewire\MasterData\DataGuru;

use App\Models\Teacher;
use Livewire\Component;

class TableGuru extends Component
{
    public $dataGuru;

    public function mount() {
        $this->dataGuru = Teacher::select(
            'teachers.id',
            'teachers.name',
            'users.email', 
            'users.role',
            'teachers.phone'
        )->join('users', 'teachers.id', '=', 'users.teacher_id')->limit(10)->get();
    }
    public function render()
    {
        return view('livewire.master-data.data-guru.table-guru', ['dataGuru' => $this->dataGuru]);
    }
}
