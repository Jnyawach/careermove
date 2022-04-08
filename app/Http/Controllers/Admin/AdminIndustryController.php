<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class AdminIndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $industries=Industry::all();
        return  view('admin.industry.index', compact('industries'));
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
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'status'=>'required|max:1'
        ]);
        $industry=Industry::create([
            'name'=>$validated['name'],
            'status'=>$validated['status']

        ]);
        return  redirect()->back()->with('status','Profession added Successfully');
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
        $industry=Industry::findBySlugOrFail($id);
        return  view('admin.industry.show', compact('industry'));
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
        $industry=Industry::findOrFail($id);
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'status'=>'required|max:1'
        ]);
        $industry->update([
            'name'=>$validated['name'],
            'status'=>$validated['status']

        ]);
        return  redirect()->back()->with('status','Profession udated Successfully');
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
        $industry=Industry::findOrFail($id);
        $industry->delete();
    }
}
