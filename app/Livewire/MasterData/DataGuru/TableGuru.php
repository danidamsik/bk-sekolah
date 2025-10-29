<?php

namespace App\Livewire\MasterData\DataGuru;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class TableGuru extends Component
{
    use WithPagination;

    public function render()
    {
        $dataGuru = Teacher::select(
            'teachers.id',
            'teachers.name',
            'teachers.nip',
            'users.email', 
            'users.role',
            'teachers.phone'
        )->join('users', 'teachers.id', '=', 'users.teacher_id')->paginate(10);

        return view('livewire.master-data.data-guru.table-guru', ['dataGuru' => $dataGuru]);
    }
}
