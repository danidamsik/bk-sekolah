<?php

namespace App\Livewire\MasterData\DataGuru;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class TableGuru extends Component
{
    use WithPagination;

    public $search = '';
    public $roleFilter = '';

    public function delete($id) {
        Teacher::find($id)->delete();

        $this->dispatch('succses-notif', messege: "Data Guru berhasil di hapus");
    } 

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingRoleFilter()
    {
        $this->resetPage();
    }
    
    #[On('succses-notif')] 
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
            ->leftJoin('users', 'teachers.id', '=', 'users.teacher_id'); // ⬅️ ubah di sini

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
