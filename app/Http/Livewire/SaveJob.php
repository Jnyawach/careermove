<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SaveJob extends Component
{
    public $job;

    public function render()
    {
        return view('livewire.save-job');
    }
    public function saveJob($id){
        $user=Auth::user();
        $user->wishlist()->create([
            'job_id'=>$id
        ]);
        $this->dispatchBrowserEvent('name-updated');

    }

}
