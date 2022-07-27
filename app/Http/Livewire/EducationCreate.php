<?php

namespace App\Http\Livewire;

use App\Models\Education;
use App\Rules\Colon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EducationCreate extends Component
{
    public $education_summary;
    public $institution;
    public $degree;
    public $current;
    public $start;
    public $end;
    public $grade;
    public $education_level;

    protected $rules=[
        'institution'=>'required|string|max:120',
        'degree'=>'required|string|max:120',
        'education_level'=>'required|string|max:120',
        'grade'=>'required|string|max:50',
        'current'=>'nullable|integer|max:2',
        'start'=>'required|string|max:255|date',
        'end'=>'nullable|required_without:current|max:255|date',
        'education_summary'=>'required'

    ];
    protected $messages=[
        'institution.required'=>'Please provide a institution name',
        'institution.max'=>'The institution name is too long. Please use a shorter institution name',
        'degree.required'=>'Please provide a degree',
        'degree.max'=>'The degree name is too long. Please use a shorter degree name',
        'grade.required'=>'Please provide a grade name',
        'grade.max'=>'The grade name is too long. Please use a shorter name',
        'start.required'=>'Please provide a start date',
        'end.required_without'=>'Please provide end date',
        'education_summary.required'=>'Please provide a education summary',


    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.education-create');
    }

    public function createEducation(){
        $this->validate();
        $this->validate(['education_summary'=>new Colon]);


        $education=Education::create([
            'institution'=>$this->institution,
            'degree'=>$this->degree,
            'education_level'=>$this->education_level,
            'education_summary'=>$this->education_summary,
            'start'=>$this->start,
            'end'=>$this->end,
            'current'=>$this->current,
            'grade'=>$this->grade,
            'user_id'=>Auth::id(),
            'visibility'=>1

        ]);

        return redirect('dashboard')
        ->with('status','Education Successfully created');

    }
}
