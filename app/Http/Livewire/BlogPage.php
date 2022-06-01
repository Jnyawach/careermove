<?php

namespace App\Http\Livewire;
use App\Models\Post;

use Livewire\Component;

class BlogPage extends Component
{
    public $totalRecords;
    public $loadAmount=10;

    public function mount(){
        $this->totalRecords=Post::count();
    }
    public function loadMore(){
        $this->loadAmount+=10;
    }
    public function render()
    {
        $posts=Post::where('status',1)->get();
        $intro=$posts[0];
        $header=$posts->slice(1,3);

        $you=$posts->slice(4,4);
        $trending=Post::where('status',1)->limit($this->loadAmount)->get();
        return view('livewire.blog-page',[
            'intro'=>$intro,
            'header'=>$header,
            'you'=>$you,
            'trending'=>$trending,
        ]);
    }
}
