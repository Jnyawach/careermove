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
        $intro=Post::latest()->first();
        $header=Post::latest()->limit(3)->get();
        $you=Post::latest()->limit(4)->get();
        $trending=Post::limit($this->loadAmount)->get();
        return view('livewire.blog-page',[
            'intro'=>$intro,
            'header'=>$header,
            'you'=>$you,
            'trending'=>$trending,
        ]);
    }
}
