<?php

namespace App\Livewire\MasterData\DataSiswa;

use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\On;
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

    public function delete($id)
    {
        Student::find($id)->delete();

        $this->dispatch('succses-notif', messege: "data siswa berhasil dihapus");
    }

    #[On('succses-notif')]
    public function render()
    {
        $query = Student::select(
            'students.id',
            'students.nisn',
            'students.name',
            'classes.id as kelas_id',
            'classes.name as nama_kelas',
            'teachers.name as wali_kelas',
            'teachers.id as wali_kelas_id',
            DB::raw('COALESCE(SUM(violations.point), 0) as total_point'),
            'students.parent_name',
            'students.parent_contact'
        )
            ->join('classes', 'students.class_id', '=', 'classes.id')
            ->join('teachers', 'students.teacher_id', '=', 'teachers.id')
            ->leftJoin('violation_reports', 'students.id', '=', 'violation_reports.student_id')
            ->leftJoin('violations', 'violation_reports.violation_id', '=', 'violations.id')
            ->groupBy(
                'students.id',
                'students.nisn',
                'students.name',
                'classes.id',
                'classes.name',
                'teachers.id',
                'teachers.name',
                'students.parent_name',
                'students.parent_contact'
            );

        if (!empty($this->search)) {
            $query->where('students.name', 'like', '%' . $this->search . '%')
                ->orWhere('students.nisn', 'like', '%' . $this->search . '%');
        }

        $dataSiswa = $query->orderBy('students.created_at', 'desc')->paginate(10);

        return view('livewire.master-data.data-siswa.table-siswa', [
            'dataSiswa' => $dataSiswa,
        ]);
    }
}
