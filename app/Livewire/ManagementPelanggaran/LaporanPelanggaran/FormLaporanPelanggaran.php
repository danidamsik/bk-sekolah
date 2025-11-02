<?php

namespace App\Livewire\ManagementPelanggaran\LaporanPelanggaran;

use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Violation;
use App\Models\ViolationReport;
use Livewire\Component;

class FormLaporanPelanggaran extends Component
{
    public $id, $student_id, $class_id, $violation_id, $teacher_id, $date, $time, $location, $status='Baru', $description;
    public $kelas, $guru, $violation, $student;

    public function mount()
    {
        $this->kelas = ClassRoom::select('id', 'name')->get();
        $this->student = Student::select('students.id', 'students.name', 'classes.id as class_id')
            ->join('classes', 'students.class_id', '=', 'classes.id')
            ->orderBy('students.name')
            ->get();
        $this->guru = Teacher::select('id', 'name')->orderBy('name')->get();
        $this->violation = Violation::select('id', 'name')->orderBy('name')->get();
    }

    protected function rules()
    {
        return [
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'violation_id' => 'required|exists:violations,id',
            'teacher_id' => 'required|exists:teachers,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'description' => 'required|string|min:5|max:1000',
            'status' => 'required|in:Baru,Diproses,Selesai,Konseling',
        ];
    }

    protected function messages()
    {
        return [
            'student_.required' => 'Nama siswa wajib dipilih.',
            'student_id.exists' => 'Siswa yang dipilih tidak valid.',
            'class_id.required' => 'Kelas wajib dipilih.',
            'class_id.exists' => 'Kelas yang dipilih tidak valid.',
            'violation_id.required' => 'Jenis pelanggaran wajib dipilih.',
            'violation_id.exists' => 'Pelanggaran yang dipilih tidak valid.',
            'teacher_id.required' => 'Guru penanggung jawab wajib dipilih.',
            'teacher_id.exists' => 'Guru yang dipilih tidak valid.',
            'date.required' => 'Tanggal kejadian wajib diisi.',
            'date.date' => 'Format tanggal tidak valid.',
            'time.required' => 'Waktu kejadian wajib diisi.',
            'time.date_format' => 'Format waktu tidak valid (gunakan format HH:MM, contoh: 08:30).',
            'location.required' => 'Lokasi kejadian wajib diisi.',
            'location.string' => 'Lokasi harus berupa teks.',
            'location.max' => 'Lokasi tidak boleh lebih dari 255 karakter.',
            'description.required' => 'Deskripsi kejadian wajib diisi.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.min' => 'Deskripsi minimal 5 karakter.',
            'description.max' => 'Deskripsi maksimal 1000 karakter.',
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status yang dipilih tidak valid. Pilih salah satu: Baru, Diproses, Selesai, atau Konseling.',
        ];
    }

    public function createOrUpdate()
    {
        $this->validate($this->rules(), $this->messages());

        ViolationReport::updateOrCreate(
            ['id' => $this->id],
            [
                'student_id' => $this->student_id,
                'violation_id' => $this->violation_id,
                'teacher_id' => $this->teacher_id,
                'date' => $this->date,
                'time' => $this->time . ':00',
                'location' => $this->location,
                'description' => $this->description,
                'status' => $this->status,
            ]
        );

        $message = $this->id ? 'Laporan berhasil diupdate!' : 'Laporan berhasil disimpan!';
        $this->dispatch('succses-notif', messege: $message);
        $this->reset('id', 'student_id', 'class_id', 'violation_id', 'teacher_id', 'date', 'time', 'location', 'description');
    }

    public function render()
    {
        return view('livewire.management-pelanggaran.laporan-pelanggaran.form-laporan-pelanggaran', [
            'kelas' => $this->kelas,
            'guru' => $this->guru,
            'violation' => $this->violation,
            'student' => $this->student
        ]);
    }
}
