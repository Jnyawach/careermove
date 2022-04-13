<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use App\Models\Profession;
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
    public $exp_success=false;

    public function mount(){
        $this->email=$this->user->email;
        $this->name=$this->user->name;
        $this->lastName=$this->user->profile->lastName;
        $this->title=$this->user->profile->title;
        $this->experienceId=$this->user->profile->experience_id;
        $this->professionId=$this->user->profession;
        $this->experiences=Experience::pluck('name','id');
        $this->professions=Profession::pluck('name','id');
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

    public function experienceUpdate(){
        $validatedData=$this->validate([
            'experienceId' => 'required|integer|max:255',
            'title' => 'required|string|max:255',

        ]);
        $this->user->profile()->update([
           'experience_id'=>$this->experienceId,
           'title'=>$this->title
        ]);
        $this->exp_success="Updated Successfully";

    }

    public function professionDelete($id){
        $this->user->profession()->detach($id);
        return $this->redirect('accounts');
    }
    public function professionUpdate($id){
        $this->user->profession()->syncWithoutDetaching($id);
        return $this->redirect('accounts');
    }
}
