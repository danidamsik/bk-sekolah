<?php

namespace App\Livewire\MasterData\DataGuru;

use Livewire\Attributes\Validate;
use Livewire\Component;

class FormGuru extends Component
{
    public $Id;

    #[Validate('required|string|min:3')]
    public $name;

    #[Validate('required|numeric|digits_between:5,18')]
    public $nip;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|regex:/^[0-9]+$/|min:10|max:15')]
    public $phone;

    public function createOrUpdate()
    {
    
        $this->validate();
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama guru wajib diisi.',
            'name.min' => 'Nama guru minimal 3 karakter.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.numeric' => 'NIP hanya boleh berupa angka.',
            'email.required' => 'Email guru wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'phone.regex' => 'Nomor HP hanya boleh angka.',
            'phone.min' => 'Nomor HP minimal 10 digit.',
            'phone.max' => 'Nomor HP maksimal 15 digit.',
        ];
    }

    public function render()
    {
        return view('livewire.master-data.data-guru.form-guru');
    }
}
