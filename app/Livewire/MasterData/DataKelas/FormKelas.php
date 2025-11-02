<?php

namespace App\Livewire\MasterData\DataKelas;

use App\Models\ClassRoom;
use App\Models\Teacher;
use Livewire\Component;

class FormKelas extends Component
{
    public $id, $class_name, $teacher_id, $dataTeacher;

    public function mount()
    {
        $this->dataTeacher = Teacher::select('teachers.id', 'teachers.name')
            ->join('users', 'teachers.id', '=', 'users.teacher_id')
            ->get();
    }

    protected function rules()
    {
        return [
            'class_name' => 'required|min:2|max:50',
            'teacher_id' => 'required|exists:teachers,id',
        ];
    }

    protected function messages()
    {
        return [
            'class_name.required' => 'Nama kelas wajib diisi.',
            'class_name.min' => 'Nama kelas minimal 2 karakter.',
            'class_name.max' => 'Nama kelas maksimal 50 karakter.',

            'teacher_id.required' => 'Wali kelas wajib dipilih.',
            'teacher_id.exists' => 'Wali kelas yang dipilih tidak valid.',
        ];
    }

    public function createOrUpdate()
    {
        $this->validate($this->rules(), $this->messages());

        ClassRoom::updateOrCreate(
            ['id' => $this->id],
            [
                'name' => $this->class_name,
                'teacher_id' => $this->teacher_id
            ]
        );

        $message = $this->id ? 'Kelas berhasil diupdate!' : 'Kelas berhasil disimpan!';

        $this->dispatch('succses-notif', messege: $message);

        $this->reset('id', 'class_name', 'teacher_id');
    }

    public function render()
    {
        return view('livewire.master-data.data-kelas.form-kelas', [
            'dataTeacher' => $this->dataTeacher
        ]);
    }
}
