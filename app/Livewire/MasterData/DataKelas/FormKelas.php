<?php

namespace App\Livewire\MasterData\DataKelas;

use Livewire\Attributes\Validate;
use Livewire\Component;

class FormKelas extends Component
{    
    public $id;

    #[Validate('required|string|min:2')]
    public $nama_kelas;

    #[Validate('required|string|min:3')]
    public $wali_kelas;

    #[Validate('required|integer|min:1|max:100')]
    public $jumlah_siswa;

    public function createOrUpdate()
    {
        $this->validate();
    }

    protected function messages()
    {
        return [
            'nama_kelas.required' => 'Nama kelas wajib diisi.',
            'nama_kelas.min' => 'Nama kelas minimal 2 karakter.',
            'wali_kelas.required' => 'Nama wali kelas wajib diisi.',
            'wali_kelas.min' => 'Nama wali kelas minimal 3 karakter.',
            'jumlah_siswa.required' => 'Jumlah siswa wajib diisi.',
            'jumlah_siswa.integer' => 'Jumlah siswa harus berupa angka.',
            'jumlah_siswa.min' => 'Jumlah siswa minimal 1 orang.',
            'jumlah_siswa.max' => 'Jumlah siswa maksimal 100 orang.',
        ];
    }

    public function render()
    {
        return view('livewire.master-data.data-kelas.form-kelas');
    }
}
