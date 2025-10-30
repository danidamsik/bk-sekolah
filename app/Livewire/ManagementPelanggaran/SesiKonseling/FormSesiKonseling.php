<?php

namespace App\Livewire\ManagementPelanggaran\SesiKonseling;

use Livewire\Attributes\Validate;
use Livewire\Component;

class FormSesiKonseling extends Component
{
    public $id;

    #[Validate('required|string|min:3')]
    public $nama_siswa;

    #[Validate('required|string|min:3')]
    public $nama_guru;

    #[Validate('required|date')]
    public $session_date;

    #[Validate('required|in:scheduled,completed,cancelled')]
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

            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nama_guru.min' => 'Nama guru minimal 3 karakter.',

            'session_date.required' => 'Tanggal sesi wajib diisi.',
            'session_date.date' => 'Format tanggal tidak valid.',

            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status hanya boleh bernilai scheduled, completed, atau cancelled.',
        ];
    }

    public function render()
    {
        return view('livewire.management-pelanggaran.sesi-konseling.form-sesi-konseling');
    }
}
