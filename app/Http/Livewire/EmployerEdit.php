<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployerEdit extends Component
{
    public $title, $industryId,$professionId,$companyId,$deadline,
        $locationId, $experienceId,$tags,$link,$content,$industries,$locations,
        $companies,$professions, $experiences,$user_id,$job, $types,$typeId;
    public $success=false;
    public $currentStep=1;
    public function lastStep(){
        $this->currentStep = $this->currentStep-1;
    }
    public function mount(){
        $this->title=$this->job->title;
        $this->companyId=$this->job->company_id;
        $this->experienceId=$this->job->experience_id;
        $this->locationId=$this->job->location_id;
        $this->professionId=$this->job->profession_id;
        $this->industryId=$this->job->industry_id;
        $this->link=$this->job->link;
        $this->deadline=$this->job->deadline;
        $this->content=$this->job->description;
        $this->tags=$this->job->tags;
        $this->typeId=$this->job->type_id;
    }

    public function firstStepSubmit(){
        $validatedData=$this->validate([
            'title' => 'required|string|max:150',
            'link'=>'nullable|string|max:255',
            'deadline'=>'required|string|max:255|date',
            'industryId' => 'required|integer|max:100',
            'professionId' => 'required|integer|max:100',
            'typeId' => 'required|integer|max:100',
            'companyId' => 'required|integer|max:100',
            'experienceId' => 'required|integer|max:100',
            'locationId' => 'required|integer|max:100',

        ]);
        $this->currentStep = 2;
    }

    public function lastStepSubmit(){

        $validatedData=$this->validate([
            'content'=>'required',
            'tags'=>'required',
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
            'company_id'=>$this->companyId,
            'description'=>$this->content,
            'deadline'=>$this->deadline,
            'tags'=>$this->tags,
            'status_id'=>1,

        ]);
        $this->success="Job Listing Updated Successfully";
    }

    public function render()
    {
        return view('livewire.employer-edit');
    }
}
