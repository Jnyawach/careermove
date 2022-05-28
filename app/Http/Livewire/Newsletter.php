<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class Newsletter extends Component
{
    public $professions;
    public $professionId=[];
    public $email;
    public $name;
    public $success=false;
    public function render()
    {
        return view('livewire.newsletter');
    }
    protected $rules=[
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:subscribers',
        'professionId' => 'required|max:3|min:1',
    ];
    protected $messages=[
        'professionId.max'=>'You can only select upto three categories',
        'email.unique'=>'You have an active subscription to our newsletter',
        'professionId.required'=>'Please choose at least one category',

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function subscribeUser(){
        $this->validate();

            $subscriber=Subscriber::create([
                'name'=>$this->name,
                 'email'=>$this->email,
             ]);

             $subscriber->profession()->sync($this->professionId);
             $this->success="Thank you for subscribing to our Newsletter";
             $this->clearForm();


    }

    public function clearForm(){
        $this->name=null;
        $this->email=null;
        $this->professionId=null;
    }
}
