<?php

namespace App\Livewire\MasterData\DataKelas;

use Livewire\Component;
use App\Models\ClassRoom;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TableKelas extends Component
{
    use WithPagination;

    public $search = '';
    public $modal = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        ClassRoom::find($id)->delete();
        $this->modal = false;
            $this->dispatch('succses-notif', messege: 'Data Kelas berhasil dihapus.');
    }

    #[On('succses-notif')]
    public function render()
    {
        $query = ClassRoom::select(
            'classes.id',
            'classes.name as class_name',
            'teachers.name as teacher_name',
            'teachers.id as teacher_id',
            DB::raw('COUNT(students.id) as jumlah_siswa')
        )
        ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
        ->leftJoin('students', 'classes.id', '=', 'students.class_id')
        ->groupBy('classes.id', 'classes.name', 'teachers.name');

        if (!empty($this->search)) {
            $query->where('classes.name', 'like', '%' . $this->search . '%')
                  ->orWhere('teachers.name', 'like', '%' . $this->search . '%');
        }

        $dataKelas = $query->paginate(10);

        return view('livewire.master-data.data-kelas.table-kelas', [
            'dataKelas' => $dataKelas,
        ]);
    }
}
