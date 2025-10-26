<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Classroom;

class TopKelas extends Component
{
    public $topKelas;
    public function mount() {
        $this->topKelas =Classroom::with('teacher') // ambil wali kelas
    ->withCount([
        'students as jumlah_siswa',
        'students as total_pelanggaran' => function ($query) {
            $query->join('violation_reports', 'students.id', '=', 'violation_reports.student_id');
        },
    ])
    ->withSum([
        'students as total_poin' => function ($query) {
            $query->join('violation_reports', 'students.id', '=', 'violation_reports.student_id')
                  ->join('violations', 'violation_reports.violation_id', '=', 'violations.id');
        },
    ], 'violations.point')
    ->select('classes.*')
    ->get()
    ->map(function ($kelas) {
        return [
            'nama_kelas' => $kelas->name,
            'wali_kelas' => $kelas->teacher->name ?? '-',
            'jumlah_siswa' => $kelas->jumlah_siswa ?? 0,
            'total_pelanggaran' => $kelas->total_pelanggaran ?? 0,
            'rata_poin_per_siswa' => $kelas->jumlah_siswa
                ? round(($kelas->total_poin ?? 0) / $kelas->jumlah_siswa, 2)
                : 0,
        ];
    })
    ->sortByDesc('rata_poin_per_siswa')
    ->take(10)
    ->values();
    }
    public function render()
    {
        return view('livewire.dashboard.top-kelas', ['topKelas' => $this->topKelas]);
    }
}
