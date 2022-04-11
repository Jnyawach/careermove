<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EmployerProfile extends Component
{
    public $name;
    public $lastName;
    public $email;
    public $cellphone;
    public $organization;
    public $password;
    public $password_confirmation;
    public $user;
    public function mount(){
        $this->name=$this->user->name;
        $this->email=$this->user->email;
        $this->lastName=$this->user->employer->lastName;
        $this->cellphone=$this->user->employer->cellphone;
        $this->organization=$this->user->employer->organization;
    }
    public function render()
    {
        return view('livewire.employer-profile');
    }
}
