<?php

namespace App\Livewire\MasterData\DataSiswa;

use App\Models\ClassRoom;
use App\Models\Student;
use Livewire\Component;
use Illuminate\Validation\Rule;

class FormSiswa extends Component
{
    public $id, $name, $nisn, $class_id, $teacher_id, $parent_name, $parent_contact;
    public $dataKelas;

    public function mount()
    {
        $this->dataKelas = ClassRoom::with('teacher')
            ->select('id', 'name', 'teacher_id')
            ->get();
    }

    public function createOrUpdate()
    {
        if (!auth()->user()->isAdmin()) {
            $this->dispatch('toast', messege: 'Hanya admin yang dapat menambah atau mengubah data siswa.');
            return;
        }

        $this->validate($this->rules(), $this->messages());

        Student::updateOrCreate(
            ['id' => $this->id],
            [
                'nisn' => $this->nisn,
                'name' => $this->name,
                'class_id' => $this->class_id,
                'teacher_id' => $this->teacher_id,
                'parent_name' => $this->parent_name,
                'parent_contact' => $this->parent_contact,
            ]
        );

        $message = $this->id ? 'Data siswa berhasil diupdate!' : 'Data siswa berhasil disimpan!';
        $this->dispatch('succses-notif', messege: $message);

        $this->reset('id', 'name', 'nisn', 'class_id', 'teacher_id', 'parent_name', 'parent_contact');
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],

            'nisn' => [
                'required',
                'numeric',
                'digits_between:5,20',
                Rule::unique('students', 'nisn')->ignore($this->id)
            ],

            'parent_name' => ['required', 'string', 'min:3'],

            'parent_contact' => [
                'required',
                'regex:/^[0-9]+$/',
                'min:10',
                'max:15',
            ],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama siswa wajib diisi.',
            'name.min' => 'Nama siswa minimal 3 karakter.',

            'nisn.required' => 'NISN wajib diisi.',
            'nisn.numeric' => 'NISN hanya boleh berisi angka.',
            'nisn.digits_between' => 'NISN harus memiliki 5 hingga 20 digit.',
            'nisn.unique' => 'NISN ini sudah terdaftar untuk siswa lain.',

            'parent_name.required' => 'Nama orang tua wajib diisi.',
            'parent_name.min' => 'Nama orang tua minimal 3 karakter.',

            'parent_contact.required' => 'Nomor HP orang tua wajib diisi.',
            'parent_contact.regex' => 'Nomor HP orang tua hanya boleh angka.',
            'parent_contact.min' => 'Nomor HP orang tua minimal 10 digit.',
            'parent_contact.max' => 'Nomor HP orang tua maksimal 15 digit.',
            'parent_contact.unique' => 'Nomor HP orang tua sudah digunakan oleh siswa lain.',
        ];
    }

    public function render()
    {
        return view('livewire.master-data.data-siswa.form-siswa', ['dataKelas' => $this->dataKelas]);
    }
}
