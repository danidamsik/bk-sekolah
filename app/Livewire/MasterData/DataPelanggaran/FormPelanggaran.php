<?php

namespace App\Livewire\MasterData\DataPelanggaran;

use App\Models\Violation;
use Livewire\Component;

class FormPelanggaran extends Component
{
    public $id, $name, $point, $description;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'point' => 'required|integer|min:1',
            'description' => 'required|nullable|string|max:255',
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama pelanggaran wajib diisi.',
            'name.string' => 'Nama pelanggaran harus berupa teks.',
            'name.max' => 'Nama pelanggaran maksimal 100 karakter.',
            'point.required' => 'Poin wajib diisi.',
            'point.integer' => 'Poin harus berupa angka.',
            'point.min' => 'Poin minimal bernilai 1.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi maksimal 255 karakter.',
            'description.required' => "deskripsi Wajib di isi",
        ];
    }

    public function createOrUpdate()
    {
        $this->validate($this->rules(), $this->messages());

        Violation::updateOrCreate(
            ['id' => $this->id],
            [
                'name' => $this->name,
                'point' => $this->point,
                'description' => $this->description
            ]
        );

        $message = $this->id ? 'Pelanggaran berhasil diupdate!' : 'Pelanggaran berhasil disimpan!';
        $this->dispatch('succses-notif', messege: $message);
        $this->reset();

    }

    public function render()
    {
        return view('livewire.master-data.data-pelanggaran.form-pelanggaran');
    }
}
