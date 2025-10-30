<?php

namespace App\Livewire\ManagementPelanggaran\LaporanPelanggaran;

use Livewire\Component;
use App\Models\ViolationReport;
use Livewire\WithPagination;

class TableLaporanPelanggaran extends Component
{
    use WithPagination;

    public $search = '';
    public $kelas = '';
    public $status = '';
    public $date = '';

    public function updatingSearch() { $this->resetPage(); }
    public function updatingKelas() { $this->resetPage(); }
    public function updatingStatus() { $this->resetPage(); }
    public function updatingDate() { $this->resetPage(); }

    public function render()
    {
        $query = ViolationReport::select(
            'violation_reports.id',
            'students.name as nama_siswa',
            'classes.name as class_name',
            'violations.name as name_pelanggaran',
            'teachers.name as name_teacher',
            'violation_reports.date',
            'violation_reports.status'
        )
        ->join('students', 'violation_reports.student_id', '=', 'students.id')
        ->join('classes', 'students.class_id', '=', 'classes.id')
        ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
        ->join('teachers', 'violation_reports.teacher_id', '=', 'teachers.id');

        if (!empty($this->search)) {
            $query->where('students.name', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->kelas)) {
            $query->where('classes.name', $this->kelas);
        }

        if (!empty($this->status)) {
            $query->where('violation_reports.status', $this->status);
        }

        if (!empty($this->date)) {
            $query->whereDate('violation_reports.date', $this->date);
        }

        $violationReport = $query->paginate(10);

        return view('livewire.management-pelanggaran.laporan-pelanggaran.table-laporan-pelanggaran', [
            'violationReport' => $violationReport,
        ]);
    }
}
