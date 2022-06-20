<?php

namespace App\Http\Livewire;

use App\Models\Association;
use App\Models\Award;
use App\Models\Education;
use App\Models\Hobby;
use App\Models\Language;
use App\Models\Reference;
use App\Models\Skill;
use App\Models\Summary;
use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class DashboardPanel extends Component
{
    use WithFileUploads;
    public $summary;
    public $user;
    public $resume;
    public $cv;



    public function mount(){
        $this->user=User::findOrFail(Auth::id());
        $this->summary=Summary::where('user_id',Auth::id())->latest()->first();
        $this->cv=$this->user->getFirstMedia('resume');

    }
    public function render()
    {

        $educations=Education::where('user_id',Auth::id())->orderBy('start','DESC')->get();
        $works=Work::where('user_id',Auth::id())->orderBy('start','DESC')->get();
        $skills=Skill::where('user_id',Auth::id())->get();
        $hobbies=Hobby::where('user_id',Auth::id())->get();
        $languages=Language::where('user_id',Auth::id())->get();
        $awards=Award::where('user_id',Auth::id())->get();
        $associations=Association::where('user_id',Auth::id())->get();
        $references=Reference::where('user_id',Auth::id())->get();
        return view('livewire.dashboard-panel',[
            'educations'=>$educations,
            'works'=>$works,
            'skills'=>$skills,
            'hobbies'=>$hobbies,
            'languages'=>$languages,
            'awards'=>$awards,
            'associations'=>$associations,
            'references'=>$references,
        ]);
    }


    public function deleteEducation($id){
        $education=Education::findOrFail($id);
        $education->delete();


    }

    public function deleteWork($id){
        $work=Work::findOrFail($id);
        $work->delete();


    }
    public function deleteLanguage($id){
        $language=Language::findOrFail($id);
        $language->delete();


    }

    public function deleteAward($id){
        $award=Award::findOrFail($id);
        $award->delete();


    }

    public function deleteAssociation($id){
        $association=Association::findOrFail($id);
        $association->delete();


    }

    public function deleteReference($id){
        $reference=Reference::findOrFail($id);
        $reference->delete();


    }

    public function updatedResume(){
       $this->validate([
        'resume'=>'required|mimes:pdf,docx,doc|max:2048',

       ],
       [
        'resume.mimes'=>'Only PDF or WORD files are accepted',
        'resume.max'=>'Maximum file size is 2mb'
       ]);

       $user=User::findOrFail(Auth::id());



        if ($user->getMedia('resume')->count()>0){
            $user->clearMediaCollection('resume');
           $user->addMedia($this->resume)->toMediaCollection('resume');
        }else{
            $user->addMedia($this->resume)->toMediaCollection('resume');
        }

        $this->cv=$user->getFirstMedia('resume');

    }
}
