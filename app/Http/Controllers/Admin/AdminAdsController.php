<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;

class AdminAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adverts=Advert::all();
        return view('admin.adverts.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.adverts.create');
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
            'name'=>'required|string',
            'link'=>'required|string',
            'banner'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=728,height=90'

        ]);

        $ads=Advert::create([
            'name'=>$validated['name'],
            'link'=>$validated['link'],
            'status'=>1
        ]);

        if($banner=$request->file('banner')) {
            $ads->addMedia($banner)->toMediaCollection('banner');

        }
        return  redirect('admin/adverts')
            ->with('status','Advert added successfully');
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
        $advert=Advert::findOrFail($id);
        return view('admin.adverts.edit', compact('advert'));
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
        $advert=Advert::findOrFail($id);

        $validated=$request->validate([
            'name'=>'required|string',
            'link'=>'required|string',
            'banner'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=728,height=90'

        ]);

        $advert->update([
            'name'=>$validated['name'],
            'link'=>$validated['link'],
            'status'=>1
        ]);

        if($files=$request->file('banner')) {
            if ( $advert->getMedia('banner')->count()>0){
                $advert->clearMediaCollection('banner');
                $advert->addMedia($files)->toMediaCollection('banner');
            }else{
                $advert->addMedia($files)->toMediaCollection('banner');
            }

        }
        return  redirect('admin/adverts')
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

        $advert=Advert::findOrFail($id);
        $advert->delete();
        return redirect()->back()
        ->with('status','Advert Successfully deleted');


    }
}
