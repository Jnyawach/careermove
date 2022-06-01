<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class AdminComment extends Component
{
    public $comment, $user_id, $post_id, $post, $like, $dislike;

    public function mount(){
        $this->dislike=$this->post->dislike;
        $this->like=$this->post->like;

    }
    public function render()
    {
        sleep(seconds:2);
        $comments=Comment::where('post_id', $this->post->id)->latest()->get();
        return view('livewire.admin-comment',[
            'comments'=>$comments
        ]);
    }

    public function deleteComment($id){
        $comment=Comment::findOrFail($id);
        $comment->delete();
    }
}
