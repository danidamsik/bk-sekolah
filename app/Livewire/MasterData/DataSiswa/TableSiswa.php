<?php

namespace App\Livewire\MasterData\DataSiswa;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TableSiswa extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Student::select(
            'students.id',
            'students.nisn',
            'students.name',
            'classes.name as nama_kelas',
            'teachers.name as wali_kelas',
            DB::raw('SUM(violations.point) as total_point'),
            'students.parent_name',
            'students.parent_contact'
        )
            ->join('classes', 'students.class_id', '=', 'classes.id')
            ->join('teachers', 'students.teacher_id', '=', 'teachers.id')
            ->join('violation_reports', 'students.id', '=', 'violation_reports.student_id')
            ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
            ->groupBy(
                'students.id',
                'students.nisn',
                'students.name',
                'classes.name',
                'teachers.name',
                'students.parent_name',
                'students.parent_contact'
            );

        if (!empty($this->search)) {
            $query->where('students.name', 'like', '%' . $this->search . '%')
                ->orWhere('students.nisn', 'like', '%' . $this->search . '%');
        }


        $dataSiswa = $query->paginate(10);

        return view('livewire.master-data.data-siswa.table-siswa', [
            'dataSiswa' => $dataSiswa,
        ]);
    }
}
