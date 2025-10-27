<?php

namespace App\Livewire\ManagementPelanggaran\SesiKonseling;

use App\Models\CounselingSession;
use Livewire\Component;
// use Livewire\WithPagination;

class TableSesiKonseling extends Component
{
    public $dataKonseling;

    public function mount() 
    {
        $this->dataKonseling = CounselingSession::select(
            'students.name',
            'teachers.name as nama_guru',
            'counseling_sessions.session_date',
            'violation_reports.status'
        )->join('students', 'counseling_sessions.student_id', '=', 'students.id')
        ->join('teachers', 'counseling_sessions.teacher_id', '=', 'teachers.id')
        ->join('violation_reports', 'counseling_sessions.violation_report_id', '=', 'violation_reports.id')->get();
    }
    public function render()
    {
        return view('livewire.management-pelanggaran.sesi-konseling.table-sesi-konseling');
    }
}
