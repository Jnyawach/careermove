<?php

namespace App\Http\Livewire;

use App\Models\Industry;
use App\Models\Profession;
use App\Models\Work;
use App\Rules\Colon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WorkExperience extends Component
{
    public $current;
    public $achievement;
    public $organization;
    public $title;
    public $size;
    public $profession;
    public $industry;
    public $start;
    public $end;

    protected $rules=[
        'organization'=>'required|string|max:120',
        'title'=>'required|string|max:120',
        'size'=>'required|string|max:120',
        'profession'=>'required|integer|max:100',
        'industry'=>'required|integer|max:100',
        'current'=>'nullable|integer|max:2',
        'start'=>'required|string|max:255|date',
        'end'=>'nullable|required_without:current|max:255|date',
        'achievement'=>'required',



    ];
    protected $messages=[
        'organization.required'=>'Please provide a organization name',
        'organization.max'=>'The organization name is too long. Please use a shorter institution name',
        'title.required'=>'Please provide a title',
        'title.max'=>'The title is too long. Please use a shorter title',
        'size.required'=>'Please select organization size',
        'start.required'=>'Please provide a start date',
        'end.required_without'=>'Please provide end date',
        'achievement.required'=>'Please provide work achievement',




    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $industries=Industry::orderBy('name')->get();
        $professions=Profession::orderBy('name')->get();

        return view('livewire.work-experience',[
            'industries'=>$industries,
            'professions'=>$professions,

        ]);
    }

    public function createWork(){
        $this->validate();
        $this->validate(['achievement'=>new Colon]);
        $work=Work::create([
            'organization'=>$this->organization,
            'title'=>$this->title,
            'size'=>$this->size,
            'achievement'=>$this->achievement,
            'start'=>$this->start,
            'end'=>$this->end,
            'profession_id'=>$this->profession,
            'industry_id'=>$this->industry,
            'user_id'=>Auth::id(),
            'current'=>$this->current,
            'visibility'=>1
        ]);

        return redirect('dashboard')
        ->with('status','Work Experience Successfully Created');

    }
}
