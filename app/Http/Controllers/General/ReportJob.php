<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportJob extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //
        $validated=$request->validate([
            'reason'=>'required|max:100',
            'additional'=>'required|max:300'
        ]);
        $report=Report::create([
            'job_id'=>$id,
            'reason'=>$validated['reason'],
            'additional'=>$validated['additional']
        ]);
        return redirect()->back()
            ->with('status','We have recieved your report. Please be asured that we are working on it');
    }
}
