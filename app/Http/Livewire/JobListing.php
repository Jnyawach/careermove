<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Wishlist;
use App\Models\Location;
use App\Models\Profession;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;


class JobListing extends Component
{
    use WithPagination;
    public $location;
    public $experience;
    public $publish;
    public $profession;
    public $search;
    public $industry;
    public $foo;
    public $order;
    public $visible=false;


    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'order' => ['except' => ''],
        'publish' => ['except' => ''],
        'experience' => ['except' => ''],
        'location' => ['except' => ''],
        'profession' => ['except' => ''],
        'industry' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function paginationView()
    {
        return 'vendor.pagination.live';
    }
    public function updatingSearch()
    {
        $this->resetPage();
        $this->visible=true;
    }
    public function updatingExperience()
    {
        $this->resetPage();
        $this->visible=true;
    }
    public function updatingOrder()
    {
        $this->resetPage();
        $this->visible=true;


    }
    public function updatingLocation(){
        $this->resetPage();
        $this->visible=true;
    }
    public function updatingPublish(){
        $this->resetPage();
        $this->visible=true;
    }
    public function updatingProfession(){
        $this->resetPage();
        $this->visible=true;
    }
    public function updatingIndustry(){
        $this->resetPage();
        $this->visible=true;
    }
    public function render()
    {
        sleep(seconds:2);
        $jobs=Job::active()
        ->when($this->search,function ($query){
            return $query->where('title', 'like', '%'.$this->search.'%');
        })
            ->when($this->location,function ($query){
               return $query->where('location_id',$this->location);
            })
            ->when($this->publish, function ($query){
                return $query->where('created_at','>',Carbon::now()->subDays($this->publish)->endOfDay());
            })
            ->when($this->experience, function ($query){
                return $query->where('experience_id',$this->experience);
            })
            ->when($this->profession, function ($query){
                return $query->where('profession_id',$this->profession);
            })
            ->when($this->industry, function ($query){
                return $query->where('industry_id',$this->industry);
            })
            ->when($this->order, function ($query){
                return $query->orderBy('deadline',$this->order);
            })
            ->paginate(10);
        $locations=Location::orderBy('name')->get();
        $professions=Profession::orderBy('name')->get();
        $industries=Industry::orderBy('name')->get();
        $experiences=Experience::all();

        return view('livewire.job-listing',[
            'jobs'=>$jobs,
            'locations'=>$locations,
            'experiences'=>$experiences,
            'professions'=>$professions,
            'industries'=>$industries,
        ]);
    }
    public function clearFilter(){
        $this->reset();
        $this->visible=false;
    }


}
