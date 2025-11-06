<?php

namespace App\Livewire\MasterData\DataKelas\DetailKelas;

use Livewire\Component;
use App\Models\ClassRoom;
use App\Models\ViolationReport;

class CardKelas extends Component
{
    public $wali_kelas, $jumlah_siswa, $total_point;
    
    public function mount($classId)
    {
        $kelas = ClassRoom::with(['teacher', 'students'])->find($classId);
        $this->wali_kelas = $kelas->teacher->name;
        $this->jumlah_siswa = $kelas->students->count();
        
        $this->total_point = ViolationReport::whereIn('student_id', $kelas->students->pluck('id'))
            ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
            ->sum('violations.point');
    }
    public function render()
    {
        return view('livewire.master-data.data-kelas.detail-kelas.card-kelas', [
            'jumlah_siswa' => $this->jumlah_siswa,
            'wali_kelas' => $this->wali_kelas,
            'total_point' => $this->total_point
        ]);
    }
}
