<?php

namespace App\Livewire\PengaturanSistem;

use App\Models\User;
use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class FormManagementUser extends Component
{
    public $user_id, $user_name, $email, $role, $teacher_name, $teacher_id;

    public function createOrUpdate()
    {
        $this->validate(
            $this->rules(),
            $this->messages()
        );

        $user = User::find($this->user_id);

        if ($user) {
            $user->update([
                'name'  => $this->user_name,
                'email' => $this->email,
                'role'  => $this->role,
                'teacher_id' => $this->teacher_id,
            ]);
        } else {

            if ($this->teacher_id != '') {
                $newUser = User::create([
                    'name'       => $this->user_name,
                    'email'      => $this->email,
                    'role'       => $this->role,
                    'password'   => Hash::make('Login123'),
                    'teacher_id' => $this->teacher_id,
                ]);
            } else {
                $newUser = User::create([
                    'name'       => $this->user_name,
                    'email'      => $this->email,
                    'role'       => $this->role,
                    'password'   => Hash::make('Login123'),
                    'teacher_id' => $this->teacher_id,
                ]);

                $newTeacher = Teacher::create([
                    'name' => $this->user_name,
                    'nip'   => rand(1000000000, 9999999999), 
                    'phone' => "phone belum ada"
                ]);

                $newUser->update([
                    'teacher_id' => $newTeacher->id,
                ]);
            }
        }

        $message = $this->user_id ? 'User berhasil diupdate!' : 'User berhasil disimpan!';
        $this->dispatch('succses-notif', messege: $message);
        $this->reset(['user_id', 'user_name', 'email', 'role', 'teacher_name', 'teacher_id']);
    }

    protected function rules()
    {
        return [
            'user_name' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:100',
            'role' => 'required|in:Admin,GuruBK,WaliKelas', // sesuaikan dengan role di sistemmu
            'teacher_name' => 'nullable|string|max:100',
        ];
    }

    protected function messages()
    {
        return [
            'user_name.required' => 'Nama user wajib diisi.',
            'user_name.string' => 'Nama user harus berupa teks.',
            'user_name.min' => 'Nama user minimal harus memiliki 3 karakter.',
            'user_name.max' => 'Nama user tidak boleh lebih dari 100 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 100 karakter.',

            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role harus salah satu dari: Admin, GuruBK, atau WaliKelas.',

            'teacher_name.string' => 'Nama guru harus berupa teks.',
            'teacher_name.max' => 'Nama guru tidak boleh lebih dari 100 karakter.',
        ];
    }

    public function render()
    {
        return view('livewire.pengaturan-sistem.form-management-user');
    }
}
