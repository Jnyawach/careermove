<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Experience;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Location;
use App\Models\Profession;
use App\Models\Status;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs=Job::where('user_id',Auth::id())->paginate(10);
        return  view('employers.careers.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types=Type::all();
        $experiences=Experience::orderBy('name')->get();
        $industries=Industry::orderBy('name')->get();
        $professions=Profession::orderBy('name')->get();
        $locations=Location::orderBy('name')->get();
        $companies=Company::orderBy('name')->get();
        return  view('employers.careers.create', compact('experiences',
            'professions','locations','companies','industries','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $job=Job::findBySlugOrFail($id);
        return view('employers.careers.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $types=Type::all();
        $job=Job::findOrFail($id);
        $experiences=Experience::orderBy('name')->get();
        $industries=Industry::orderBy('name')->get();
        $professions=Profession::orderBy('name')->get();
        $locations=Location::orderBy('name')->get();
        $companies=Company::orderBy('name')->get();
        return  view('employers.careers.edit', compact('experiences',
            'professions','locations','companies','industries','job','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function careersPending(){
        $jobs=Job::where('user_id',Auth::id())->where('status_id',1)->paginate(10);
        return view('employers/careers/pending', compact('jobs'));
    }
    public function careersActive(){
        $jobs=Job::where('user_id',Auth::id())->where('status_id',2)->paginate(10);
        return view('employers/careers/active', compact('jobs'));
    }
    public function careersInactive(){
        $jobs=Job::where('user_id',Auth::id())->where('status_id',5)->paginate(10);
        return view('employers/careers/inactive', compact('jobs'));
    }
    public function careersBlocked(){
        $jobs=Job::where('user_id',Auth::id())->where('status_id',4)->paginate(10);
        return view('employers/careers/blocked', compact('jobs'));
    }
}
