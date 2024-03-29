<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\Template;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedResumes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        $resumes=Resume::where('status',1)->get();
        return view('dashboard.saved-resumes.index', compact('resumes','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $resume=Resume::findOrFail($id);
        $resume->delete();
        return redirect('dashboard/saved-resumes')
            ->with('status','Resume Successfully deleted');
    }

    public function resumeDownload($id){
       $resume=Resume::findOrFail($id);
       $template=Template::findOrFail($resume->template_id);
       $user=Auth::user();



       //return view('templates.'.$template->folder.'.index', compact('resume','user'));
    }
}
