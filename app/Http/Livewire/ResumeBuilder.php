<?php

namespace App\Http\Livewire;

use App\Models\Summary;
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
    public $resume;

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



    public function Previous(){
        $this->page=$this->page-1;
    }
    public function nextPage(){
        $this->page=$this->page+1;

    }
}
