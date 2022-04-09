<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Location;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies=Company::all();
        return  view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $locations=Location::orderBy('name')->pluck('name','id');
        return  view('admin.companies.create', compact('locations'));
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
            'location_id'=>'required|integer',
            'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $company=Company::create([
            'name'=>$validated['name'],
            'location_id'=>$validated['location_id']
        ]);
        if($logo=$request->file('logo')) {
            $company->addMedia($logo)->toMediaCollection('logo');

        }
        return  redirect('admin/companies')
            ->with('status','Company/Organization added successfully');

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
        $company=Company::findBySlugOrFail($id);
        return  view('admin.companies.show', compact('company'));
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
        $company=Company::findOrFail($id);
        $locations=Location::orderBy('name')->pluck('name','id');
        return  view('admin.companies.edit', compact('locations','company'));
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
        $company=Company::findOrFail($id);
        $validated=$request->validate([
            'name'=>'nullable|string|max:255',
            'location_id'=>'nullable|integer',
            'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $company->update([
            'name'=>$validated['name'],
            'location_id'=>$validated['location_id']
        ]);
        if($files=$request->file('logo')) {
            if ( $company->getMedia('logo')->count()>0){
                $company->clearMediaCollection('logo');
                $company->addMedia($files)->toMediaCollection('logo');
            }else{
                $company->addMedia($files)->toMediaCollection('logo');
            }

        }
        return  redirect('admin/companies')
            ->with('status','Company/Organization updated successfully');


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
        $company=Company::findOrFail($id);
        $company->delete();
        return  redirect('admin/companies')
            ->with('status','Company/Organization deleted successfully');
    }
}
