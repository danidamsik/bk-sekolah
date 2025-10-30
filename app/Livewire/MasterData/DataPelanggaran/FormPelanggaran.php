<?php

namespace App\Livewire\MasterData\DataPelanggaran;

use Livewire\Attributes\Validate;
use Livewire\Component;

class FormPelanggaran extends Component
{
    public $id;

    #[Validate('required|string|min:3')]
    public $name;

    #[Validate('required|integer|min:1|max:100')]
    public $point;

    #[Validate('required|nullable|string|max:255')]
    public $description;

    public function createOrUpdate()
    {
        $this->validate();
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama pelanggaran wajib diisi.',
            'name.min' => 'Nama pelanggaran minimal 3 karakter.',
            'point.required' => 'Poin pelanggaran wajib diisi.',
            'point.integer' => 'Poin pelanggaran harus berupa angka.',
            'point.min' => 'Poin pelanggaran minimal 1.',
            'point.max' => 'Poin pelanggaran maksimal 100.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.required' => 'Deskripsi tidak boleh kosong.',
            'description.max' => 'Deskripsi maksimal 255 karakter.',
        ];
    }

    public function render()
    {
        return view('livewire.master-data.data-pelanggaran.form-pelanggaran');
    }
}
