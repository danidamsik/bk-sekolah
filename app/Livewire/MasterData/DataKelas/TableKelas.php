<?php

namespace App\Livewire\MasterData\DataKelas;

use Livewire\Component;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TableKelas extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = ClassRoom::select(
            'classes.id',
            'classes.name as nama_kelas',
            'teachers.name as wali_kelas',
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
