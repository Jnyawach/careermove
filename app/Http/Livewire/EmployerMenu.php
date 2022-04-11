<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployerMenu extends Component
{
    public $jobs;
    public function mount(){
        $this->jobs=Job::where('user_id',Auth::id())->get();
    }
    public function render()
    {
        return view('livewire.employer-menu');
    }
}
