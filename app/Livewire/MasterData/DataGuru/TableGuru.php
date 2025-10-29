<?php

namespace App\Livewire\MasterData\DataGuru;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class TableGuru extends Component
{
    use WithPagination;

    public $search = '';
    public $roleFilter = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingRoleFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Teacher::select(
            'teachers.id',
            'teachers.name',
            'teachers.nip',
            'users.email',
            'users.role',
            'teachers.phone'
        )
        ->join('users', 'teachers.id', '=', 'users.teacher_id');

        if (!empty($this->search)) {
            $query->where('teachers.name', 'like', '%' . $this->search . '%');
        }
        
        if (!empty($this->roleFilter)) {
            $query->where('users.role', $this->roleFilter);
        }

        $dataGuru = $query->paginate(10);

        return view('livewire.master-data.data-guru.table-guru', [
            'dataGuru' => $dataGuru,
        ]);
    }
}
