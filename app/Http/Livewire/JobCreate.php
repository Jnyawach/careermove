<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;



class JobCreate extends Component
{
    public $title, $industryId,$professionId,$deadline,
    $locationId, $experienceId,$tags,$link,$content,$industries,$locations,
    $companies,$professions, $experiences,$user_id,$types,$typeId,$ranges,$rangeId;
    public $success=false;
    public $currentStep=1;
    public $exists=null;
    public $companyId;
    public $selected=false;
    public $search;

    protected $queryString = ['search' => ['except' => '']];

    public function lastStep(){
        $this->currentStep = $this->currentStep-1;
    }

    public function render()

    {
        $company=Company::when($this->search, function ($query){
            return $query->where('name', 'like', '%'.$this->search.'%')->first();
        });

        $this->exists = Job::where('title', '=', $this->title)
        ->where('company_id',$this->companyId)
        ->where('experience_id',$this->experienceId)
        ->where('created_at','>=', Carbon::now()->subDays(30))->first();
        return view('livewire.job-create',[
           'exists'=>$this->exists,
           'company'=>$company,

        ]);
    }

    public function clearCompany(){
        $this->selected=false;
        $this->search=null;

        $this->companyId=null;


    }
    public function createCompany($id){
        $this->companyId=$id;
        $this->selected=Company::findOrFail($id);
    }



    public function firstStepSubmit(){
        $validatedData=$this->validate([
            'title' => 'required|string|max:150',
            'link'=>'nullable|string|max:255',
            'deadline'=>'required|string|max:255|date',
            'industryId' => 'required|integer|max:100',
            'typeId' => 'required|integer|max:100',
            'professionId' => 'required|integer|max:100',
            'companyId' => 'required|integer',
            'experienceId' => 'required|integer|max:100',
            'locationId' => 'required|integer|max:100',
            'rangeId' => 'required|integer|max:100',



        ],
        [
            'companyId.required'=>'Please select listing Company/Organization',
            'title.required'=>'Please provide a valid title',
            'deadline.required'=>'Please provide deadline for listing',
            'industryId.required'=>'Please select the listing industry',
            'typeId.required'=>'Please select Job type',
            'professionId.required'=>'Please select profession category',
            'experienceId.required'=>'Please select experience level',
            'locationId.required'=>'Please select Job Location',
            'rangeId.required'=>'Please select salary range'
        ]
);
        $this->currentStep = 2;
    }


    public function lastStepSubmit(){

        $validatedData=$this->validate([
            'content'=>'required',
            'tags'=>'required',
        ],[
            'content.required'=>'Please provide job description',
            'tags.required'=>'Please provide meta description'
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
            'status_id'=>2,
            'meta_description'=>$this->tags,
            'range_id'=>$this->rangeId,
        ]);

        $this->clearForm();
        return redirect('admin/jobs')
        ->with('status','Job Created Successfully');
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

    public function dismissInfo(){
        $this->exists=null;

    }





}
