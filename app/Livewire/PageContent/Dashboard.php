<?php

namespace App\Livewire\PageContent;

use Livewire\Component;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $id;
    
    public function mount()
    {
        $teacher = Auth::user()->teacher_id;
        $this->id = ClassRoom::where('teacher_id', $teacher)->value('id');
    }
    public function render()
    {
        return view('livewire.page-content.dashboard');
    }
}
