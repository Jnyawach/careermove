<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public  $name;
    public $email;
    public $subject;
    public $message;
    public $success=false;
    protected $rules=[
        'name' => 'required|string|max:100|min:3',
        'subject' => 'required|string|max:100',
        'email'=>'required|email|string|max:255',
        'message'=>'required|min:3|max:2000'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.contact-form');
    }

    public  function clearForm(){
        $this->name=null;
        $this->email=null;
        $this->subject=null;
        $this->message=null;
    }

    public function createMessage(){
        $this->validate();
        $mess=Contact::create([
            'name'=>$this->name,
            'subject'=>$this->subject,
            'email'=>$this->email,
            'message'=>$this->message,

        ]);
        Mail::send('mailing.contact', ['mess'=>$mess], function ($message) use($mess){
            $message->to($mess->email);
            $message->subject($mess->subject);

        });
        $this->clearForm();
        $this->success=true;

    }
}
