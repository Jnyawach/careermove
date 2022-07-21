<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class UserProfile extends Component
{
    use WithFileUploads;
    public $user;
    public $name;
    public $cellphone;
    public $lastName;
    public $title;
    public $experience;
    public $gender;
    public $birthday;
    public $website;
    public $linkedin;
    public $photo;


    public function mount(){

        $this->name=$this->user->name;
        $this->lastName=$this->user->profile->lastName;
        $this->cellphone=$this->user->profile->cellphone;
        $this->experience=$this->user->profile->experience_id;
        $this->title=$this->user->profile->title;
        $this->gender=$this->user->profile->gender;
        $this->birthday=$this->user->profile->birthday;
        $this->linkedin=$this->user->profile->linkedin;
        $this->website=$this->user->profile->website;

    }

    protected $rules=[
        'title'=>'required|string|max:120',
        'name'=>'required|string|max:120',
        'lastName'=>'required|string|max:120',
        'gender'=>'required|string|max:120',
        'cellphone'=>'required|min:10|string|max:13',
        'linkedin'=>'nullable|string|max:255',
        'website'=>'nullable|string|max:255',
        'birthday'=>'required|string|max:255|date',

    ];

    protected $messages=[
        'title.required'=>'Please provide a title',
        'title.max'=>'The title is too long. Please use a shorter title',
        'name.required'=>'Please provide a name',
        'name.max'=>'The name is too long. Please use a shorter name',
        'lastName.required'=>'Please provide a last name',
        'lastName.max'=>'The last name is too long. Please use a shorter name',
        'gender.required'=>'Please provide a gender',
        'cellphone.required'=>'Please provide a cellphone number',
        'cellphone.min'=>'Please provide a valid cellphone number',
        'cellphone.max'=>'Please provide a valid cellphone number',
        'birthday.required'=>'Please provide a birthdate',
        'linkedin.max'=>'The provided link is too long. Enter a shorter link',
        'website.max'=>'The provided link is too long. Enter a shorter link',


    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()

    {
        $experinces=Experience::pluck('name','id');
        return view('livewire.user-profile',[
            'experiences'=>$experinces,
        ]);
    }

    public function updateUser(){
        $this->validate();

        $this->user->update([
            'name'=>$this->name,
        ]);
        $this->user->profile()->update([
            'lastName'=>$this->lastName,
            'website'=>$this->website,
            'experience_id'=>$this->experience,
            'birthday'=>$this->birthday,
            'linkedin'=>$this->linkedin,
            'gender'=>$this->gender,
            'cellphone'=>$this->cellphone,
        ]);
       return redirect('dashboard')
       ->with('status', 'Profile Successfully Updated');
    }

    public function updatePicture(){

        $validate=$this->validate([
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:ratio=1/1',
        ],
            [
                'photo.required'=>'Please provide a profile picture',
                'photo.mimes'=>'Allowed formats (jpeg, png, jpg, gif)',
                'photo.dimensions'=>'Provide only Square images',
                'photo.max_width'=>'Maximum width and height allowed is 100px'
            ]

        );

        $user=User::findOrFail(Auth::id());



        if ($user->getMedia('profile')->count()>0){
            $user->clearMediaCollection('profile');
            $user->addMedia($this->photo)->toMediaCollection('profile');
        }else{
            $user->addMedia($this->photo)->toMediaCollection('profile');
        }

        return redirect('dashboard')
        ->with('status','Profile Picture Updated Successfully');

    }


}
