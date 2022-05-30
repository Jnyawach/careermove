<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Wishlist;


class SaveJob extends Component
{
    public $job;
    public $saved =false;

    public function render()
    {
        return view('livewire.save-job');
    }



    public function saveJob($id){
        if (Auth::check()) {
           $saved= Wishlist::firstOrCreate([
                'user_id'=>Auth::id(),
                'job_id'=>$id
            ]);

        }else{
            redirect('login');
        }
    }

}
