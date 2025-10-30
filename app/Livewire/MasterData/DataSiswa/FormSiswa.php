<?php

namespace App\Livewire\MasterData\DataSiswa;

use Livewire\Attributes\Validate;
use Livewire\Component;

class FormSiswa extends Component
{
    public $id;

    #[Validate('required|string|min:3')]
    public $name;

    #[Validate('required|numeric|digits_between:5,20')]
    public $nisn;

    #[Validate('required|string|min:2')]
    public $nama_kelas;

    #[Validate('required|string|min:3')]
    public $wali_kelas;

    #[Validate('required|integer|min:0')]
    public $total_point;

    #[Validate('required|string|min:3')]
    public $parent_name;

    #[Validate('required|regex:/^[0-9]+$/|min:10|max:15')]
    public $parent_contact;

    public function createOrUpdate()
    {
        $this->validate();
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama siswa wajib diisi.',
            'name.min' => 'Nama siswa minimal 3 karakter.',
            
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.numeric' => 'NISN hanya boleh berisi angka.',
            'nisn.digits_between' => 'NISN harus memiliki 5 hingga 20 digit.',

            'nama_kelas.required' => 'Nama kelas wajib diisi.',
            'nama_kelas.min' => 'Nama kelas minimal 2 karakter.',

            'wali_kelas.required' => 'Wali kelas wajib diisi.',
            'wali_kelas.min' => 'Nama wali kelas minimal 3 karakter.',

            'total_point.required' => 'Total poin wajib diisi.',
            'total_point.integer' => 'Total poin harus berupa angka.',
            'total_point.min' => 'Total poin minimal 0.',

            'parent_name.required' => 'Nama orang tua wajib diisi.',
            'parent_name.min' => 'Nama orang tua minimal 3 karakter.',

            'parent_contact.required' => 'Nomor HP orang tua wajib diisi.',
            'parent_contact.regex' => 'Nomor HP orang tua hanya boleh angka.',
            'parent_contact.min' => 'Nomor HP orang tua minimal 10 digit.',
            'parent_contact.max' => 'Nomor HP orang tua maksimal 15 digit.',
        ];
    }

    public function render()
    {
        return view('livewire.master-data.data-siswa.form-siswa');
    }
}
