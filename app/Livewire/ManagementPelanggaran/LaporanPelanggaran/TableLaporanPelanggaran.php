<?php

namespace App\Livewire\ManagementPelanggaran\LaporanPelanggaran;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\ViolationReport;

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

    public function delete($id)
    {
        ViolationReport::find($id)->delete();
        $this->dispatch('succses-notif', messege: 'Data Pelanggaran Berhasil Dihapus');
    }
    
    #[On('succses-notif')] 
    public function render()
    {
        $query = ViolationReport::select(
            'violation_reports.id',
            'violation_reports.teacher_id as teacher_id',
            'students.name as nama_siswa',
            'students.id as siswa_id',
            'classes.name as class_name',
            'classes.id as class_id',
            'violations.name as name_pelanggaran',
            'violations.id as violation_id',
            'teachers.name as name_teacher',
            'violation_reports.date',
            'violation_reports.time',
            'violation_reports.description',
            'violation_reports.location',
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
