<?php

namespace App\Livewire\ManagementPelanggaran\SesiKonseling;

use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;

class FormSesiKonseling extends Component
{
    public $id, $violation_report_id, $student_id, $teacher_id, $session_date, $status, $notes, $recommendation, $follow_up_plan;
    public $student, $guru;

    public function mount()
    {
        $this->student = Student::select('id', 'name')->get();
        $this->guru = Teacher::select('teachers.id', 'teachers.name')
            ->join('users', 'teachers.id', '=', 'users.teacher_id')->where('users.role', 'GuruBK')->get();
    }

    public function createOrUpdate()
    {
        $this->validate($this->rules(), $this->messages());
    }

    protected function rules()
    {
        return [
            'violation_report_id' => 'required|integer',
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'session_date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
            'recommendation' => 'nullable|string',
            'follow_up_plan' => 'nullable|string',
        ];
    }

    protected function messages()
    {
        return [
            'violation_report_id.required' => 'Laporan pelanggaran wajib diisi.',
            'violation_report_id.integer' => 'Laporan pelanggaran harus berupa angka.',
            'student_id.required' => 'Siswa wajib dipilih.',
            'student_id.exists' => 'Siswa yang dipilih tidak ditemukan.',
            'teacher_id.required' => 'Guru BK wajib dipilih.',
            'teacher_id.exists' => 'Guru BK yang dipilih tidak ditemukan.',
            'session_date.required' => 'Tanggal sesi wajib diisi.',
            'session_date.date' => 'Tanggal sesi tidak valid.',
            'status.required' => 'Status sesi wajib diisi.',
            'status.string' => 'Status sesi harus berupa teks.',
            'notes.string' => 'Catatan harus berupa teks.',
            'recommendation.string' => 'Rekomendasi harus berupa teks.',
            'follow_up_plan.string' => 'Rencana tindak lanjut harus berupa teks.',
        ];
    }

    public function render()
    {
        return view('livewire.management-pelanggaran.sesi-konseling.form-sesi-konseling', [
            'student' => $this->student,
            'guru' => $this->guru
        ]);
    }
}
