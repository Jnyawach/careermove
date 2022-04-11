<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class EmployerCompany extends Component
{
    public $companies;
    public $organization_id;
    public $organization;
    public $success;
    public $search;
    protected $queryString = ['search'];
    public  function mount(){
        $this->companies=Auth::user()->companies;

    }
    public function updatedSearch(){
        $this->run();
    }
    public function run(){
        $this->organization =Company::where('name', 'like', '%'.$this->search.'%')->latest()->first();

    }

    public function render()
    {
        return view('livewire.employer-company');
    }

    public function attachCompany($organization){
        $user=User::findOrFail(Auth::id());
        $user->companies()->attach($organization);
        return redirect()->to('employers/organizations');
    }
    public function unlinkCompany($organization){
        $user=User::findOrFail(Auth::id());
        $user->companies()->detach($organization);
        return redirect()->to('employers/organizations');
    }

}
