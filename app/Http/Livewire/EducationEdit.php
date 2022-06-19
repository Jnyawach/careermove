<?php

namespace App\Http\Livewire;

use App\Models\Education;
use Livewire\Component;

class EducationEdit extends Component
{
    public $education_summary;
    public $institution;
    public $degree;
    public $current;
    public $start;
    public $end;
    public $grade;
    public $education_level;
    public $education;

    public function mount(){
        $this->education_summary=$this->education->education_summary;
        $this->institution=$this->education->institution;
        $this->degree=$this->education->degree;
        $this->grade=$this->education->grade;
        $this->start=$this->education->start;
        $this->end=$this->education->end;
        $this->education_level=$this->education->education_level;
        $this->current=$this->education->current;


    }
    protected $rules=[
        'institution'=>'required|string|max:120',
        'degree'=>'required|string|max:120',
        'education_level'=>'required|string|max:120',
        'grade'=>'required|string|max:50',
        'current'=>'nullable|integer|max:2',
        'start'=>'required|string|max:255|date',
        'end'=>'required_without:current|string|max:255|date',
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
        return view('livewire.education-edit');
    }

    public function collegeUpdate(){
        $this->validate();

        $education=Education::findOrFail($this->education->id);
        $education->update([
            'institution'=>$this->institution,
            'degree'=>$this->degree,
            'education_level'=>$this->education_level,
            'education_summary'=>$this->education_summary,
            'start'=>$this->start,
            'end'=>$this->end,
            'current'=>$this->current,
            'grade'=>$this->grade,


        ]);

        return redirect('dashboard')
        ->with('status','Education Successfully Updated');

    }
}
