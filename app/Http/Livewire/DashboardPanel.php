<?php

namespace App\Http\Livewire;

use App\Models\Education;
use App\Models\Summary;
use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardPanel extends Component
{
    public $summary;
    public $user;



    public function mount(){
        $this->user=User::findOrFail(Auth::id());
        $this->summary=Summary::where('user_id',Auth::id())->latest()->first();

    }
    public function render()
    {
        
        $educations=Education::where('user_id',Auth::id())->orderBy('start','DESC')->get();
        $works=Work::where('user_id',Auth::id())->orderBy('start','DESC')->get();
        return view('livewire.dashboard-panel',[
            'educations'=>$educations,
            'works'=>$works,
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
}
