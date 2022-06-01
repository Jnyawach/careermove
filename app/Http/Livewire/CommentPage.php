<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentPage extends Component
{
    public $comment, $user_id, $post_id, $post, $like, $dislike;

    public function mount(){
        $this->dislike=$this->post->dislike;
        $this->like=$this->post->like;

    }

    protected $rules=[
        'comment'=>'required|max:300'
    ];
    protected $messages=[
        'comment.required'=>'Please type the comment',
        'comment.max'=>'The comment cannot exceed 300 characters'

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()

    {
        sleep(seconds:2);
        $comments=Comment::where('post_id', $this->post->id)->latest()->get();
        return view('livewire.comment-page',[
            'comments'=>$comments,
        ]);
    }

    public function saveComment(){
        $this->validate();
        $comment= Comment::create([
            'user_id'=>Auth::id(),
            'post_id'=>$this->post->id,
            'comment'=>$this->comment,

        ]);

        $this->comment=null;

    }

    public function updateLike(){

        $post=Post::findOrFail($this->post->id);

        $post->update(['like'=>$post->like+1]);

        $this->like=$post->like;

    }

    public function updateDislike(){

        $post=Post::findOrFail($this->post->id);

        $post->update(['dislike'=>$post->dislike+1]);

        $this->dislike=$post->dislike;

    }
}
