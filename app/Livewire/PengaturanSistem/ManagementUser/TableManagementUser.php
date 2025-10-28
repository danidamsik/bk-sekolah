<?php

namespace App\Livewire\PengaturanSistem\ManagementUser;

use App\Models\User;
use Livewire\Component;

class TableManagementUser extends Component
{
    public $user;

    public function mount()
    {
        $this->user = User::select(
            'users.id',
            'users.name as nama_user',
            'users.email',
            'users.role',
            'teachers.name as nama_guru',
        )
        ->leftJoin('teachers', 'users.teacher_id', '=', 'teachers.id')
        ->orderBy('users.role')
        ->orderBy('users.name')
        ->get();
    }
    public function render()
    {
        return view('livewire.pengaturan-sistem.management-user.table-management-user', ['users' => $this->user]);
    }
}
