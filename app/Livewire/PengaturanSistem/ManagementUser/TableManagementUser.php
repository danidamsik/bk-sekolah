<?php

namespace App\Livewire\PengaturanSistem\ManagementUser;
use App\Models\User;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\Attributes\On;

class TableManagementUser extends Component
{


    public $modal = false;


     public function delete($id) {
        User::find($id)->delete();

        $this->modal = false;

        $this->dispatch('succses-notif', messege:"User Behasil Dihapus");
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
