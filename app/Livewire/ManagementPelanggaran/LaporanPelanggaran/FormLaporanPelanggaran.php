<?php

namespace App\Livewire\ManagementPelanggaran\LaporanPelanggaran;

use Livewire\Attributes\Validate;
use Livewire\Component;

class FormLaporanPelanggaran extends Component
{
    public $id;

    #[Validate('required|string|min:3')]
    public $nama_siswa;

    #[Validate('required|string|min:2')]
    public $class_name;

    #[Validate('required|string|min:3')]
    public $name_pelanggaran;

    #[Validate('required|string|min:3')]
    public $name_teacher;

    #[Validate('required|date')]
    public $date;

    #[Validate('required|in:pending,approved,rejected')]
    public $status;

    public function createOrUpdate()
    {
        $this->validate();
    }

    protected function messages()
    {
        return [
            'nama_siswa.required' => 'Nama siswa wajib diisi.',
            'nama_siswa.min' => 'Nama siswa minimal 3 karakter.',

            'class_name.required' => 'Nama kelas wajib diisi.',
            'class_name.min' => 'Nama kelas minimal 2 karakter.',

            'name_pelanggaran.required' => 'Nama pelanggaran wajib diisi.',
            'name_pelanggaran.min' => 'Nama pelanggaran minimal 3 karakter.',

            'name_teacher.required' => 'Nama guru wajib diisi.',
            'name_teacher.min' => 'Nama guru minimal 3 karakter.',

            'date.required' => 'Tanggal pelanggaran wajib diisi.',
            'date.date' => 'Format tanggal tidak valid.',

            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status hanya boleh bernilai pending, approved, atau rejected.',
        ];
    }

    public function render()
    {
        return view('livewire.management-pelanggaran.laporan-pelanggaran.form-laporan-pelanggaran');
    }
}
