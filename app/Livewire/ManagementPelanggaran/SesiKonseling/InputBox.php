<?php

namespace App\Livewire\ManagementPelanggaran\SesiKonseling;

use App\Models\ViolationReport;
use Livewire\Component;

class InputBox extends Component
{
    public $violation_reports;

    public function mount()
    {
        $this->violation_reports = ViolationReport::select(
            'violation_reports.id',
            'violation_reports.student_id',
            'violations.name',
            'students.name as student_name'
        )
            ->join('students', 'violation_reports.student_id', '=', 'students.id')
            ->join('violations', 'violation_reports.violation_id', 'violations.id')
            ->where('violation_reports.status', 'Baru')->get();
    }
    public function render()
    {
        return view('livewire.management-pelanggaran.sesi-konseling.input-box');
    }
}
