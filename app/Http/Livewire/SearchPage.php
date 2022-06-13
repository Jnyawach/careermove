<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\Post;
use App\Models\Company;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class SearchPage extends Component
{
    public $search;
    public $foo;
    public $jobs;
    public $posts;
    public $companies;
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],

    ];

    public function render()
    {
        $blogs=Post::latest()->limit(4)->get();
        $vacancies=Job::latest()->limit(4)->get();
        $hirings=Company::whereHas('jobs', function (Builder $query){
            $query->active();
        })->get();
        //based on Search

        return view('livewire.search-page',[
            'blogs'=>$blogs,
            'vacancies'=>$vacancies,
            'hirings'=>$hirings,

        ]);


    }
    public function updatedSearch(){
        $this->run();
    }



    public function run(){
        $this->jobs=Job::active()->when($this->search,function ($query){
            return $query->where('title', 'like', '%'.$this->search.'%');
        })->limit(4)->get();

        $this->posts=Post::where('status',1)->when($this->search,function ($query){
            return $query->where('title', 'like', '%'.$this->search.'%');
        })->limit(4)->get();

        $this->companies=Company::when($this->search,function ($query){
            return $query->where('name', 'like', '%'.$this->search.'%');
        })->limit(4)->get();
    }
}
