<?php

namespace App\Http\Livewire;

use App\Models\Resume;
use App\Models\Summary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeBuilder extends Component
{

    public $address;
    public $page=1;
    public $resume;
    public $template;

    public function mount(){
        $this->user=Auth::user();
        $this->resume;
        $this->template;



    }

    public function AddressDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['personal_info'=>0]);
        $this->resume=$resume;

    }

    public function AddressEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['personal_info'=>1]);
        $this->resume=$resume;
    }
    public function SummaryEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['intro'=>1]);
        $this->resume=$resume;
    }
    public function SummaryDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['intro'=>0]);
        $this->resume=$resume;
    }

    public function ExperienceEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['experience'=>1]);
        $this->resume=$resume;
    }
    public function ExperienceDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['experience'=>0]);
        $this->resume=$resume;
    }

    public function EducationEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['education'=>1]);
        $this->resume=$resume;
    }
    public function EducationDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['education'=>0]);
        $this->resume=$resume;
    }

    public function AwardEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['certifications'=>1]);
        $this->resume=$resume;
    }
    public function AwardDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['certifications'=>0]);
        $this->resume=$resume;
    }

    public function ReferenceEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['references'=>1]);
        $this->resume=$resume;
    }
    public function ReferenceDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['references'=>0]);
        $this->resume=$resume;
    }

    public function SoftEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['soft_skills'=>1]);
        $this->resume=$resume;
    }
    public function SoftDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['soft_skills'=>0]);
        $this->resume=$resume;
    }

    public function HardEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['hard_skills'=>1]);
        $this->resume=$resume;
    }
    public function HardDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['hard_skills'=>0]);
        $this->resume=$resume;
    }

    public function LanguageEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['language'=>1]);
        $this->resume=$resume;
    }
    public function LanguageDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['language'=>0]);
        $this->resume=$resume;
    }

    public function HobbiesEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['hobbies'=>1]);
        $this->resume=$resume;
    }
    public function HobbiesDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['hobbies'=>0]);
        $this->resume=$resume;
    }

    public function SocialEnable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['social_media'=>1]);
        $this->resume=$resume;
    }
    public function SocialDisable(){
        $resume=Resume::findOrFail($this->resume->id);
        $resume->update(['social_media'=>0]);
        $this->resume=$resume;
    }



    public function render()
    {
        return view('livewire.resume-builder');
    }



    public function Previous(){
        $this->page=$this->page-1;
    }
    public function nextPage(){
        $this->page=$this->page+1;

    }
}
