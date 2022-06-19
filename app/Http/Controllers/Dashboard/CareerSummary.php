<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Summary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerSummary extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return redirect('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('dashboard.summary.create');
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

        $validated=$request->validate([
            'summary'=>'required|min:3|max:1000'
        ],[
            'summary.max'=>'Please use a maximum of 200 words'
        ]
    );
    $user=User::findOrFail(Auth::id());

    $user->summary()->updateOrCreate([
       'summary'=>$validated['summary']
    ]);

    return redirect('dashboard')
    ->with('status','Career summary Successfully updated');

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
        $summary=Summary::findOrFail($id);
        return view('dashboard.summary.edit', compact('summary'));
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
        $summary = Summary::findOrFail($id);
        $validated = $request->validate([
            'summary' => 'required|min:3|max:1000'
        ], [
            'summary.max' => 'Please use a maximum of 200 words'
        ]);

        $summary->update([
            'summary' => $validated['summary']

        ]);

        return redirect('dashboard')
        ->with('status', 'Career summary Successfully updated');
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
}
