<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class ReferenceController extends Controller
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
        return view('dashboard.references.create');
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
            'title'=>'required|string|max:100',
            'organization'=>'required|string|max:100',
            'relation'=>'required|string|max:50',
            'email'=>'email|string|required',
            'cellphone'=>'required'

           ]);

           $user=Auth::user();
           $user->references()->create($validated);
           return redirect('dashboard')
           ->with('status','Reference Successfully added');
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
        $reference=Reference::findOrFail($id);
        return view('dashboard.references.edit', compact('reference'));
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
        $reference=Reference::findOrFail($id);
        $validated=$request->validate([
            'name'=>'required|string|max:100',
            'title'=>'required|string|max:100',
            'organization'=>'required|string|max:100',
            'relation'=>'required|string|max:50',
            'email'=>'email|string|required',
            'cellphone'=>'required'

           ]);
           $reference->update($validated);
           return redirect('dashboard')
           ->with('status','Reference Successfully updated');
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
