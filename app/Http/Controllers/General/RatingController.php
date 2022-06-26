<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('rating.index');
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
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string|max:50',
            'title'=>'required|string|max:50',
            'content'=>'required',
            'rating'=>'integer|required|max:5|min:1',
            'profile'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ],[
            'required'=>':attribute cannot be empty',

        ]);

        $testimony=Testimony::create([
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'title'=>$validated['title'],
            'content'=>$validated['content'],
            'rating'=>$validated['rating'],
            'status'=>0

        ]);

        if($files=$request->file('profile')){
            $testimony->addMedia($files)->toMediaCollection('profile');
        }

        return redirect('/');
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
    }
}
