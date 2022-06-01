<?php

namespace App\Http\Livewire;


use App\Models\Author;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component

{
    use WithFileUploads;
    public $post,$title, $content,$summary,$author,$image_credit,$image_card,$tags;
    protected $messages=[
        'image_card.dimensions'=>'The image dimensions should be strictly 960px by 540px',
        'author.required'=>'Please select at least one author'
    ];
    protected $rules=[

        'title'=>'required|min:10|string|max:120',
        'image_credit'=>'required|min:10|string|max:120',
        'author'=>'required|integer|max:250',
        'summary'=>'required|min:10|string|max:500',
        'tags'=>'required|string',
        'content'=>'required',
        'image_card'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=960,height=540',


    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(){
        $this->title=$this->post->title;
        $this->author=$this->post->author_id;
        $this->summary=$this->post->summary;
        $this->tags=$this->post->tags;
        $this->content=$this->post->content;
        $this->image_credit=$this->post->image_credit;
    }

    public function render()
    {
        $authors=Author::orderBy('first_name')->get();
        return view('livewire.post-edit',[
            'authors'=>$authors,
        ]);


    }

    public function updatePost(){
        $this->validate();
        $post=Post::findOrFail($this->post->id);
        $post->update([
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
            $this->post->clearMediaCollection('imageCard');
            $this->post->addMedia($files)->toMediaCollection('imageCard');
        }

        $this->reset();

        return redirect('admin/posts')
         ->with('status','Post Created Updated');

    }
}
