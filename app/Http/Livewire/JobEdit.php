<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobEdit extends Component
{
    public $title, $industryId,$professionId,$deadline,
        $locationId, $experienceId,$tags,$link,$content,$industries,$locations,
        $companies,$professions, $experiences,$user_id,$job, $types,$typeId,$ranges,$rangeId;
    public $success=false;
    public $currentStep=1;
    public $search;
    public $selected=false;
    public $change=true;

    protected $queryString = ['search' => ['except' => '']];
    public function lastStep(){
        $this->currentStep = $this->currentStep-1;
    }
    public function mount(){
        $this->title=$this->job->title;

        $this->experienceId=$this->job->experience_id;
        $this->locationId=$this->job->location_id;
        $this->professionId=$this->job->profession_id;
        $this->industryId=$this->job->industry_id;
        $this->link=$this->job->link;
        $this->deadline=$this->job->deadline;
        $this->content=$this->job->description;
        $this->tags=$this->job->tags;
        $this->typeId=$this->job->type_id;
        $this->rangeId=$this->job->range_id;


    }

    public function clearChange(){
        $this->change=false;
        $this->selected=null;
    }

    public function firstStepSubmit(){
        $validatedData=$this->validate([
            'title' => 'required|string|max:150',
            'link'=>'nullable|string|max:255',
            'deadline'=>'required|string|max:255|date',
            'industryId' => 'required|integer|max:100',
            'professionId' => 'required|integer|max:100',
            'typeId' => 'required|integer|max:100',

            'experienceId' => 'required|integer|max:100',
            'locationId' => 'required|integer|max:100',
            'rangeId' => 'required|integer|max:100',

        ],
        [

            'title.required'=>'Please provide a valid title',
            'deadline.required'=>'Please provide deadline for listing',
            'industryId.required'=>'Please select the listing industry',
            'typeId.required'=>'Please select Job type',
            'professionId.required'=>'Please select profession category',
            'experienceId.required'=>'Please select experience level',
            'locationId.required'=>'Please select Job Location',
            'rangeId.required'=>'Please select salary range'
        ]);
        $this->currentStep = 2;
    }
    public function clearCompany(){
        $this->selected=false;
        $this->search=null;




    }
    public function createCompany($id){
        $job=Job::findOrFail($this->job->id);
        $job->update([
            'company_id'=>$id,

        ]);
        $this->selected=Company::findOrFail($id);

    }

    public function lastStepSubmit(){

        $validatedData=$this->validate([
            'content'=>'required',
            'tags'=>'required',
        ],
        [
            'content.required'=>'Please provide job description',
            'tags.required'=>'Please provide tags associated with the job'
        ]);
        $job=Job::findOrFail($this->job->id);



        $job->update([
            'title'=>$this->title,
            'link'=>$this->link,
            'experience_id'=>$this->experienceId,
            'profession_id'=>$this->professionId,
            'location_id'=>$this->locationId,
            'industry_id'=>$this->industryId,
            'type_id'=>$this->typeId,

            'description'=>$this->content,
            'deadline'=>$this->deadline,
            'tags'=>$this->tags,
            'range_id'=>$this->rangeId,

        ]);

        $this->selected=null;



        return redirect('admin/jobs')
        ->with('status','Job Updated Successfully');


    }

    public function render()
    {
        $company=Company::when($this->search, function ($query){
            return $query->where('name', 'like', '%'.$this->search.'%')->first();
        });

        return view('livewire.job-edit',[
            'company'=>$company,
        ]);
    }


}
