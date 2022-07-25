<?php

namespace App\Http\Livewire;

use App\Models\Resume;
use App\Models\Summary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeBuilder extends Component
{

    public $address;
    public $page=1;
    public $resume;
    public $template;

    public function mount(){
        $this->user=Auth::user();
        $this->resume;
        $this->template;



    }

    public function AddressDisable(){

    }

    public function AddressEnable(){

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
