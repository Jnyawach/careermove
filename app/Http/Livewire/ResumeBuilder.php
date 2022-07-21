<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeBuilder extends Component
{
    public $name;
    public $lastName;
    public $user;
    public $cellphone;
    public $title;
    public $email;
    public $summary;
    public $page=1;

    public function mount(){
        $this->user=Auth::user();
        $this->name=$this->user->name;
        $this->lastName=$this->user->profile->lastName;
        $this->cellphone=$this->user->profile->cellphone;
        $this->title=$this->user->profile->title;
        $this->email=$this->user->email;
        if ($this->user->summary()->count()>0){
            $this->summary=$this->user->summary->summary;
        }



    }
    public function render()
    {
        return view('livewire.resume-builder');
    }

    public function PersonalDetails(){
        $this->validate([
            'name' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'cellphone'=>'required|min:10|string|max:13',
            'summary'=>'required'
        ],
        [
            'required'=>':attribute is required',
            'max'=>':attribute is too long',
            'min'=>':attribute is too short'
        ]);

        $user=User::findOrFail($this->user->id);
        $user->update([
            'name'=>$this->name
        ]);
        $user->profile()->update([
            'cellphone'=>$this->cellphone,
            'lastName'=>$this->lastName
        ]);

        $user->summary()->delete();

        $user->summary()->updateOrCreate([
            'summary'=>$this->summary
        ]);
         $this->user=$user;
         $this->page=2;

    }

    public function Previous(){
        $this->page=$this->page-1;
    }
}
