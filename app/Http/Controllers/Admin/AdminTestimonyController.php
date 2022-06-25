<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;

class AdminTestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testimonies=Testimony::all();
        return view('admin.testimony.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.testimony.create');
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
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string|max:50',
            'title'=>'required|string|max:50',
            'content'=>'required',
            'rating'=>'integer|required|max:5|min:1',
            'profile'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ],[
            'required'=>':attribute cannot be empty',

        ]);

        $testimony=Testimony::create([
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'title'=>$validated['title'],
            'content'=>$validated['content'],
            'rating'=>$validated['rating'],
            'status'=>1

        ]);

        if($files=$request->file('profile')){
            $testimony->addMedia($files)->toMediaCollection('profile');
        }

        return redirect('admin/testimony')
        ->with('status','Testimony created successfully');
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
        $testimony=Testimony::findOrFail($id);
        return view('admin.testimony.show', compact('testimony'));
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
        $testimony=Testimony::findOrFail($id);
        return view('admin.testimony.edit',compact('testimony'));
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
        $testimony=Testimony::findOrFail($id);
        $validated=$request->validate([
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string|max:50',
            'title'=>'required|string|max:50',
            'content'=>'required',
            'rating'=>'integer|required|max:5|min:1',
            'profile'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ],[
            'required'=>':attribute cannot be empty',

        ]);
        $testimony->update([
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'title'=>$validated['title'],
            'content'=>$validated['content'],
            'rating'=>$validated['rating'],
            'status'=>1

        ]);
        if($files=$request->file('profile')) {
            if ( $testimony->getMedia('profile')->count()>0){
                $testimony->clearMediaCollection('profile');
                $testimony->addMedia($files)->toMediaCollection('profile');
            }else{
                $testimony->addMedia($files)->toMediaCollection('profile');
            }

        }

        return redirect('admin/testimony')
        ->with('status','Testimony updated successfully');
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

        $testimony=Testimony::findOrFail($id);
        $testimony->delete();
        return redirect('admin/testimony')
        ->with('status', 'Testimony deleted successfully');
    }


    public function testimony(Request $request, $id){
        $testimony=Testimony::findOrFail($id);
        $testimony->update(['status'=>$request->status]);
        return redirect()->back();
    }
}
