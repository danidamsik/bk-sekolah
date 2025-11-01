<?php

namespace App\Livewire\MasterData\DataKelas;

use App\Models\ClassRoom;
use App\Models\Teacher;
use Livewire\Component;

class FormKelas extends Component
{
    public $id, $nama_kelas, $wali_kelas, $dataTeacher;

    public function mount()
    {
        $this->dataTeacher = Teacher::select('teachers.id', 'teachers.name')
            ->join('users', 'teachers.id', '=', 'users.teacher_id')
            ->get();
    }

    protected function rules()
    {
        return [
            'nama_kelas' => 'required|min:2|max:50',
            'wali_kelas' => 'required|exists:teachers,id',
        ];
    }

    protected function messages()
    {
        return [
            'nama_kelas.required' => 'Nama kelas wajib diisi.',
            'nama_kelas.min' => 'Nama kelas minimal 2 karakter.',
            'nama_kelas.max' => 'Nama kelas maksimal 50 karakter.',

            'wali_kelas.required' => 'Wali kelas wajib dipilih.',
            'wali_kelas.exists' => 'Wali kelas yang dipilih tidak valid.',
        ];
    }

    public function createOrUpdate()
    {
        $this->validate($this->rules(), $this->messages());

        ClassRoom::updateOrCreate(
            ['id' => $this->id],
            [
                'name' => $this->nama_kelas,
                'teacher_id' => $this->wali_kelas
            ]
        );

        $this->dispatch('succses-notif', messege: 'Data Kelas berhasil disimpan.');

        $this->reset('id', 'nama_kelas', 'wali_kelas');
    }

    public function render()
    {
        return view('livewire.master-data.data-kelas.form-kelas', [
            'dataTeacher' => $this->dataTeacher
        ]);
    }
}
