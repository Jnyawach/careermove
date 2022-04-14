<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyHiring extends Component
{
    public $search;
    public $foo;
    public $location;
    public $visible;
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'location' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    use WithPagination;
    public function paginationView()
    {
        return 'vendor.pagination.live';
    }
    public function updatingSearch()
    {
        $this->resetPage();
        $this->visible=true;
    }
    public function updatingLocation(){
        $this->resetPage();
        $this->visible=true;
    }
    public function render()
    {
        $companies=Company::whereHas('jobs', function (Builder $query){
            $query->active();
        })
            ->when($this->search,function ($query){
                return $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->when($this->location,function ($query){
                return $query->where('location_id',$this->location);
            })
            ->paginate(20);
        $locations=Location::orderBy('name')->get();
        return view('livewire.company-hiring'
            , [
                'companies' => $companies,
                'locations'=>$locations
            ]);
    }
    public function clearFilter(){
        $this->reset();
        $this->visible=false;
    }
}
