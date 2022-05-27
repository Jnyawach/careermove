<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;

    public $title, $content,$summary,$author,$image_credit,$image_card,$tags;
    protected $messages=[
        'image_card.dimensions'=>'The image dimensions should be strictly 800px by 550px',
        'author.required'=>'Please select at least one author'
    ];
    protected $rules=[

        'title'=>'required|min:10|string|max:120',
        'image_credit'=>'required|min:10|string|max:120',
        'author'=>'required|integer|max:250',
        'summary'=>'required|min:10|string|max:500',
        'tags'=>'required|string',
        'content'=>'required',
        'image_card'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=800,height=550',


    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $authors=Author::orderBy('first_name')->get();
        return view('livewire.post-create',[
            'authors'=>$authors,

        ]);
    }

    public function createPost(){
        $this->validate();
         $post=Post::create([
             'title'=>$this->title,
             'status'=>1,
            'index_status'=>0,
            'summary'=>$this->summary,
            'user_id'=>Auth::id(),
            'content'=>$this->content,
            'image_credit'=>$this->image_credit,
            'author_id'=>$this->author,
            'tags'=>$this->tags
         ]);

         if($files=$this->image_card){
            $post->addMedia($files)->toMediaCollection('imageCard');
        }


         $this->reset();

         return redirect('admin/posts')
         ->with('status','Post Created Successfully');


    }
}
