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
    public $modal = false;

    public function delete($id)
    {

        if (!auth()->user()->isAdmin()) {
            $this->dispatch('toast', messege: 'Hanya admin yang dapat menghapus data guru.');
            $this->modal = false;
            return;
        }

        Teacher::find($id)->delete();
        $this->modal = false;

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
            ->leftJoin('users', 'teachers.id', '=', 'users.teacher_id');

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
