<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Google\Service\ServiceControl\Auth;
use Illuminate\Http\Request;

class AdminAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $authors=Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.authors.create');
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
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'profession'=>'required|string|max:255',
            'title'=>'required|string|max:255',
            'profile'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about'=>'required'


        ]);

        $author=Author::create([
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'profession'=>$validated['profession'],
            'title'=>$validated['title'],
            'about'=>$validated['about']
        ]);
        if($profile=$request->file('profile')) {
            $author->addMedia($profile)->toMediaCollection('profile');

        }
        return  redirect('admin/authors')
            ->with('status','Author added successfully');
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
        $author=Author::findOrFail($id);
        return view('admin.authors.show', compact('author'));
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
        $author=Author::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
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

        $author=Author::findOrFail($id);
        $validated=$request->validate([
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'profession'=>'required|string|max:255',
            'title'=>'required|string|max:255',
            'profile'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about'=>'required'


        ]);
        $author->update([
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'profession'=>$validated['profession'],
            'title'=>$validated['title'],
            'about'=>$validated['about']
        ]);

        if($files=$request->file('profile')) {
            if ( $author->getMedia('profile')->count()>0){
                $author->clearMediaCollection('profile');
                $author->addMedia($files)->toMediaCollection('profile');
            }else{
                $author->addMedia($files)->toMediaCollection('profile');
            }

        }
        return  redirect('admin/authors')
            ->with('status','Author updated successfully');
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
        $author=Author::findOrFail($id);
        $author->delete();

        return  redirect('admin/authors')
        ->with('status','Author deleted successfully');
    }
}
