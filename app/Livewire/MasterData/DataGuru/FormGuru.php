<?php

namespace App\Livewire\MasterData\DataGuru;

use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Validation\Rule;

class FormGuru extends Component
{
    public $Id, $name, $nip, $phone;

    public function createOrUpdate()
    {
        $this->validate($this->rules(), $this->messages());

        Teacher::updateOrCreate(
            ['id' => $this->Id],
            [
                'name' => $this->name,
                'nip' => $this->nip,
                'phone' => $this->phone
            ]
        );

        $message = $this->Id ? 'Guru berhasil diupdate!' : 'Guru berhasil disimpan!';
        $this->dispatch('succses-notif', messege: $message);
        $this->reset();
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'nip' => [
                'required',
                'numeric',
                'digits_between:5,18',
                Rule::unique('teachers', 'nip')->ignore($this->Id)
            ],
            'phone' => [
                'required',
                'regex:/^[0-9]+$/',
                'min:10',
                'max:15',
                Rule::unique('teachers', 'phone')->ignore($this->Id)
            ],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama guru wajib diisi.',
            'name.min' => 'Nama guru minimal 3 karakter.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.numeric' => 'NIP hanya boleh berupa angka.',
            'nip.digits_between' => 'NIP harus terdiri dari 5 hingga 18 digit.',
            'nip.unique' => 'NIP ini sudah digunakan oleh guru lain.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'phone.regex' => 'Nomor HP hanya boleh angka.',
            'phone.min' => 'Nomor HP minimal 10 digit.',
            'phone.max' => 'Nomor HP maksimal 15 digit.',
            'phone.unique' => 'Nomor HP ini sudah digunakan oleh guru lain.',
        ];
    }

    public function render()
    {
        return view('livewire.master-data.data-guru.form-guru');
    }
}
