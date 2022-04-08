<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Profession;
use Illuminate\Http\Request;

class AdminProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $professions=Profession::all();
        return  view('admin.profession.index', compact('professions'));
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
        $profession=Profession::create([
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
        $profession=Profession::findBySlugOrFail($id);
        return  view('admin.profession.show', compact('profession'));
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
        $profession=Profession::findOrFail($id);
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'status'=>'required|max:1'
        ]);
        $profession->update([
            'name'=>$validated['name'],
            'status'=>$validated['status']

        ]);
        return  redirect()->back()->with('status','Profession updated Successfully');
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
        $profession=Profession::findOrFail($id);
        $profession->delete();
        return  redirect()->back()->with('status','Profession deleted Successfully');
    }
}
