<?php

namespace App\Livewire\ManagementPelanggaran\LaporanPelanggaran;

use App\Models\Student;
use Livewire\Component;

class InputBox extends Component
{
    public $students;

    public function mount()
    {
        $this->students = Student::select('students.id', 'students.name', 'classes.name as class_name', 'classes.id as class_id')
                        ->join('classes', 'students.class_id', '=', 'classes.id')->get();
    }
    public function render()
    {
        return view('livewire.management-pelanggaran.laporan-pelanggaran.input-box');
    }
}
