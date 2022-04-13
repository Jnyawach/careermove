<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class CompanyHiring extends Component
{
    public $search;

    protected $queryString = ['search'];
    public function render()
    {
        return view('livewire.company-hiring'
            , [
                'companies' => Company::where('name', 'like', '%'.$this->search.'%')->get(),
            ]);
    }
}
