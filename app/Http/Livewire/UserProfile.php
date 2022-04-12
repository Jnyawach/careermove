<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;
    public $name;
    public $password;
    public $password_confirmation;
    public $email;
    public $lastName;
    public $professions;
    public $professionId=[];
    public $title;
    public $experienceId;
    public $experiences;
    public $success=false;
    public $pass_success=false;

    public function mount(){
        $this->email=$this->user->email;
        $this->name=$this->user->name;
        $this->lastName=$this->user->profile->lastName;
        $this->title=$this->user->profile->title;
        $this->experienceId=$this->user->profile->experience;
    }
    public function render()
    {
        return view('livewire.user-profile');
    }

    public function bioUpdate(){

        $validatedData=$this->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
        ]);
        $this->user->update([
            'name'=>$this->name,
        ]);
        $this->user->profile()->update([
            'lastName'=>$this->lastName
        ]);
        $this->success="Updated Successfully";
    }
    public function passwordUpdate(){
        $validatedData=$this->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        $this->user->update([
            'password' => Hash::make($this->password)
        ]);
        $this->pass_success="Updated Successfully";

    }
}
