<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EmployerRegister extends Component
{
    public $name;
    public $lastName;
    public $email;
    public $cellphone;
    public $organization;
    public $password;
    public $password_confirmation;
    protected $rules=[
        'name' => 'required|string|max:100|min:3',
        'lastName' => 'required|string|max:100|min:3',
        'cellphone' => 'required|string|max:100|min:3',
        'organization' => 'required|string|max:100|min:3',
        'email'=>'required|email|string|max:255',
        'password' => 'required|string|min:8|confirmed',

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.employer-register');
    }

    public function createEmployer(){
        $user=User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user->employers()->create([
            'organization'=>$this->organization,
            'cellphone'=>$this->cellphone,
            'lastName'=>$this->lastName,
        ]);
        $user->assignRole('Employer');
        return redirect()->to('login');

    }

}
