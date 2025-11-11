<?php

namespace App\Livewire\PengaturanSistem\ManagementUser;

use App\Models\User;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class TableManagementUser extends Component
{
    public $modal = false;
    public $isOpen = false;
    public $users;

    public $user_id, $old_pw, $new_pw, $confir_pw;

    public function mount()
    {
        $this->users = User::select('id', 'name')->get();
    }

    protected function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'old_pw' => 'required|min:6',
            'new_pw' => [
                'required',
                'min:8',
                'different:old_pw',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'confir_pw' => 'required|same:new_pw'
        ];
    }

    protected function messages()
    {
        return [
            'user_id.required' => 'Pilih user terlebih dahulu',
            'user_id.exists' => 'User tidak ditemukan',
            'old_pw.required' => 'Password lama harus diisi',
            'old_pw.min' => 'Password lama minimal 6 karakter',
            'new_pw.required' => 'Password baru harus diisi',
            'new_pw.min' => 'Password baru minimal 8 karakter',
            'new_pw.different' => 'Password baru harus berbeda dengan password lama',
            'confir_pw.required' => 'Konfirmasi password harus diisi',
            'confir_pw.same' => 'Konfirmasi password tidak cocok dengan password baru'
        ];
    }

    public function resetPassword()
    {
        try {
            // Validasi input
            $this->validate();

            // Cari user berdasarkan ID
            $user = User::find($this->user_id);

            if (!$user) {
                $this->addError('user_id', 'User tidak ditemukan');
                return;
            }

            // Verifikasi password lama
            if (!Hash::check($this->old_pw, $user->password)) {
                $this->addError('old_pw', 'Password lama tidak sesuai');
                return;
            }

            // Update password baru
            $user->update([
                'password' => Hash::make($this->new_pw)
            ]);

            // Reset form
            $this->reset(['user_id', 'old_pw', 'new_pw', 'confir_pw']);
            $this->isOpen = false;

            // Kirim notifikasi sukses
            $this->dispatch('succses-notif', messege: "Password berhasil direset");
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Error validasi akan otomatis ditampilkan di form
            throw $e;
        } catch (\Exception $e) {
            $this->dispatch('error-notif', messege: "Terjadi kesalahan: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            
            if (!$user) {
                $this->dispatch('error-notif', messege: "User tidak ditemukan");
                return;
            }

            $user->delete();
            $this->modal = false;
            $this->dispatch('succses-notif', messege: "User Berhasil Dihapus");
            
        } catch (\Exception $e) {
            $this->modal = false;
            $this->dispatch('error-notif', messege: "Gagal menghapus user: " . $e->getMessage());
        }
    }

    #[On('succses-notif')]
    public function render()
    {
        $users = Teacher::select(
            'teachers.id',
            'teachers.name as nama_guru',
            'users.id as user_id',
            'users.name as nama_user',
            'users.email',
            'users.role'
        )
            ->leftJoin('users', 'teachers.id', '=', 'users.teacher_id')
            ->orderBy('users.role')
            ->orderBy('teachers.name')
            ->paginate(10);

        return view('livewire.pengaturan-sistem.management-user.table-management-user', ['user' => $users]);
    }
}