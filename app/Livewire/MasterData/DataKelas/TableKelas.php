<?php

namespace App\Livewire\MasterData\DataKelas;

use Livewire\Component;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\DB;

class TableKelas extends Component
{
    public $dataKelas;

    public function mount() 
    {
        $this->dataKelas = ClassRoom::select(
        'classes.id',
        'classes.name as nama_kelas',
        'teachers.name as wali_kelas',
        DB::raw('COUNT(students.id) as jumlah_siswa')
        )
        ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
        ->leftJoin('students', 'classes.id', '=', 'students.class_id')
        ->groupBy('classes.id', 'classes.name', 'teachers.name')
        ->get();
        }

    public function render()
    {
        return view('livewire.master-data.data-kelas.table-kelas', ['dataKelas' => $this->dataKelas]);
    }
}
