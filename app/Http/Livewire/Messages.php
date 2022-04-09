<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{
    use WithPagination;
    public $success=false;


    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.messages',[
            'messages'=>Contact::paginate(25),
        ]);
    }
    public function deleteMessage($id){
        $message=Contact::findOrFail($id);
        $message->delete();
        $this->success="Message Deleted Successfully";

    }
    public function readMessage($id){
        $message=Contact::findOrFail($id);
        $message->update(['status'=>1]);


    }

}
