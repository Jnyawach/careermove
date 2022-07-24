<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $templates=Template::all();
        return view('admin.cv_templates.index',compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('admin.cv_templates.create');
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
            'name'=>'required|string|max:100',
            'folder'=>'required|string|max:100|unique:templates',
            'description'=>'required',
            'status'=>'required|integer',
            'template'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

        $template=Template::create([
           'status'=>$validated['status'],
           'name'=>$validated['name'],
           'folder'=>$validated['folder'],
           'description'=>$validated['description']
        ]);

        if($preview=$request->file('template')) {
            $template->addMedia($preview)->toMediaCollection('template');

        }
        return  redirect('admin/cv_templates')
            ->with('status','Template Added Successfully');

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
        $template=Template::findBySlugOrFail($id);
        return view('admin.cv_templates.show',compact('template'));
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
        $template=Template::findOrFail($id);
        return view('admin.cv_templates.edit', compact('template'));
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
        $template=Template::findOrFail($id);

        $validated=$request->validate([
            'name'=>'required|string|max:100',
            'folder'=>'required|string|max:100',
            'description'=>'required',
            'status'=>'required|integer',
            'template'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);


        $template->update([
            'name'=>$validated['name'],
            'folder'=>$validated['folder'],
            'description'=>$validated['description'],
            'status'=>$validated['status'],
        ]);


        if($files=$request->file('template')) {
            if ( $template->getMedia('template')->count()>0){
                $template->clearMediaCollection('template');
                $template->addMedia($files)->toMediaCollection('template');
            }else{
                $template->addMedia($files)->toMediaCollection('template');
            }

        }

        return  redirect('admin/cv_templates')
            ->with('status','Template updated successfully');
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
        $template=Template::findOrFail($id);
        $template->delete();
        return  redirect('admin/cv_templates')
            ->with('status','Template Deleted Successfully');

    }
}
