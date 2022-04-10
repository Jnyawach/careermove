<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use App\Models\Profession;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use \Illuminate\Foundation\Auth\RegistersUsers;

class Wizard extends Component
{
    public $currentStep=1;
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

    public  function mount(){
        $this->experiences=Experience::pluck('name','id');
        $this->professions=Profession::pluck('name','id');
    }

    public function render()
    {
        return view('livewire.wizard');
    }

    public function employerSubmit(){
        return redirect()->to('employer_registration');

    }

    public function lastStep(){
        $this->currentStep = $this->currentStep-1;
    }
    public function firstStepSubmit(){
        $this->currentStep = 2;
    }

    public function stepTwoSubmit(){
        $validatedData=$this->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $this->currentStep = 3;
    }
    public function stepThreeSubmit(){

        $validatedData=$this->validate([
            'experienceId' => 'required|string|max:255',
            'title' => 'required|string|max:255',

        ]);
        $this->currentStep = 4;

    }
    public function stepFourSubmit(){
        $validatedData=$this->validate([
            'professionId' => 'required|array|max:255',
        ]);

        $user=User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user->profile()->create([
            'title'=>$this->title,
            'lastName'=>$this->lastName,
            'experience_id'=>$this->experienceId
        ]);
        $user->profession()->sync($this->professionId);
        $user->assignRole('User');
        return redirect()->to('login');
    }


}
