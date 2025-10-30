<?php

namespace App\Livewire\PengaturanSistem\ManagementUser;

use Livewire\Attributes\Validate;
use Livewire\Component;

class FormManagementUser extends Component
{
    public $id;

    #[Validate('required|string|min:3')]
    public $nama_user;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|in:Admin,WaliKelas,GuruBK')]
    public $role;

    #[Validate('required|nullable|string|min:3')]
    public $nama_guru;

    public function createOrUpdate()
    {
        $this->validate();
    }

    protected function messages()
    {
        return [
            'nama_user.required' => 'Nama user wajib diisi.',
            'nama_user.min' => 'Nama user minimal 3 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',

            'role.required' => 'Role wajib diisi.',
            'role.in' => 'Role hanya boleh bernilai admin, guruBK, atau wali kelas.',

            'nama_guru.string' => 'Nama guru harus berupa teks.',
            'nama_guru.min' => 'Nama guru minimal 3 karakter.',
            'nama_guru.required' => 'Nama guru wajib di isi.',
        ];
    }

    public function render()
    {
        return view('livewire.pengaturan-sistem.management-user.form-management-user');
    }
}
