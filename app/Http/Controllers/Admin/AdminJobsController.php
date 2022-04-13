<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Experience;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Location;
use App\Models\Profession;
use App\Models\Range;
use App\Models\Status;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs=Job::all();
        $statuses=Status::pluck('name','id');
        return  view('admin.jobs.index', compact('jobs','statuses'));
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
        $ranges=Range::all();
        return  view('admin.jobs.create', compact('experiences',
        'professions','locations','companies','industries','types',
        'ranges'));
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
        $statuses=Status::pluck('name','id');
        $job=Job::findBySlugOrFail($id);
        return  view('admin.jobs.show', compact('job','statuses'));
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
        $ranges=Range::all();
        return  view('admin.jobs.edit', compact('experiences',
            'professions','locations','companies','industries','job','types',
        'ranges'));
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
        $job=Job::findOrFail($id);
        $validated=$request->validate([
            'status_id' => ['required', 'integer', 'max:10'],
            'reason' => ['required_if:status_id,==,4'],

        ],[
            'reason.required_if'=>'Required when blocking a Job listing'
        ]);
        $job->update(['status_id'=>$request->status_id]);
        if ($request->status_id==4){
            $job->blocks()->create([
                'reason'=>$validated['reason'],
                'user_id'=>Auth::id(),
            ]);
        }
        return redirect()->back()
            ->with('status','Status Updated');
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
        $job=Job::findOrFail($id);
        $job->delete();
        return redirect()->to('admin/jobs')
            ->with('status','Job Listing Deleted Successfully');
    }

    public function jobsPending(){
        $jobs=Job::where('status_id',1)->get();
        $statuses=Status::pluck('name','id');
        return view('admin/jobs/pending', compact('jobs','statuses'));
    }
    public function jobsActive(){
        $jobs=Job::where('status_id',2)->get();
        $statuses=Status::pluck('name','id');
        return view('admin/jobs/active', compact('jobs','statuses'));
    }
    public function jobsDisabled(){
        $jobs=Job::where('status_id',3)->get();
        $statuses=Status::pluck('name','id');
        return view('admin/jobs/disabled', compact('jobs','statuses'));
    }
    public function jobsBlocked(){
        $jobs=Job::where('status_id',4)->get();
        $statuses=Status::pluck('name','id');
        return view('admin/jobs/blocked', compact('jobs','statuses'));
    }
    public function jobsInactive(){
        $statuses=Status::pluck('name','id');
        $jobs=Job::where('status_id',5)->get();
        return view('admin/jobs/inactive', compact('jobs','statuses'));
    }
}
