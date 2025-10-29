<?php

namespace App\Livewire\ManagementPelanggaran\SesiKonseling;

use App\Models\CounselingSession;
use Livewire\Component;
use Livewire\WithPagination;

class TableSesiKonseling extends Component
{
    use WithPagination;

    public $status = ''; 
    
    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = CounselingSession::select(
            'students.name as nama_siswa',
            'teachers.name as nama_guru',
            'counseling_sessions.session_date',
            'violation_reports.status'
        )
        ->join('students', 'counseling_sessions.student_id', '=', 'students.id')
        ->join('teachers', 'counseling_sessions.teacher_id', '=', 'teachers.id')
        ->join('violation_reports', 'counseling_sessions.violation_report_id', '=', 'violation_reports.id');

        if (!empty($this->status)) {
            $query->where('violation_reports.status', $this->status);
        }

        $dataKonseling = $query->paginate(10);

        return view('livewire.management-pelanggaran.sesi-konseling.table-sesi-konseling', [
            'dataKonseling' => $dataKonseling
        ]);
    }
}
