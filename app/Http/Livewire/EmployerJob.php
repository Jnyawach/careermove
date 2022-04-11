<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployerJob extends Component
{
    public $title, $industryId,$professionId,$companyId,$deadline,
        $locationId, $experienceId,$tags,$link,$content,$industries,$locations,
        $companies,$professions, $experiences,$user_id,$types,$typeId;
    public $success=false;
    public $currentStep=1;
    public function lastStep(){
        $this->currentStep = $this->currentStep-1;
    }
    public function render()
    {
        return view('livewire.employer-job');
    }
    public function firstStepSubmit(){
        $validatedData=$this->validate([
            'title' => 'required|string|max:150',
            'link'=>'nullable|string|max:255',
            'deadline'=>'required|string|max:255|date',
            'industryId' => 'required|integer|max:100',
            'typeId' => 'required|integer|max:100',
            'professionId' => 'required|integer|max:100',
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

        $job=Job::create([
            'title'=>$this->title,
            'link'=>$this->link,
            'user_id'=>Auth::id(),
            'experience_id'=>$this->experienceId,
            'profession_id'=>$this->professionId,
            'type_id'=>$this->typeId,
            'location_id'=>$this->locationId,
            'industry_id'=>$this->industryId,
            'company_id'=>$this->companyId,
            'description'=>$this->content,
            'deadline'=>$this->deadline,
            'status_id'=>1,
            'tags'=>$this->tags
        ]);

        $this->clearForm();
        $this->success="Job Listing Created Successfully";
    }
    public  function clearForm(){
        $this->title=null;
        $this->link=null;
        $this->experienceId=null;
        $this->professionId=null;
        $this->locationId=null;
        $this->industryId=null;
        $this->companyId=null;
        $this->content=null;
        $this->deadline=null;
        $this->tags=null;
    }


}
