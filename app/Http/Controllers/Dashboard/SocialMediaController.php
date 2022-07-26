<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialMediaController extends Controller
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
        $social=Social::pluck('name','id');
        return view('dashboard.social-media.create',compact('social'));
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
        $validate=$request->validate([
            'name'=>'required|integer|max:25',
            'link'=>'required|string|max:50'
        ],
        [
            'max'=>'Maximum length exceeded. Please use a shorter link'
        ]);

        $user=User::findOrfail(Auth::id());

        $user->links()->create([
            'social_id'=>$validate['name'],
            'link'=>$validate['link'],
        ]);

        return redirect('dashboard')
            ->with('status','Social link added successfully');
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
        $social=Social::pluck('name','id');
        $link=Link::findOrFail($id);
        return view('dashboard.social-media.edit',compact('social','link'));
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
        $validate=$request->validate([
            'name'=>'required|integer|max:25',
            'link'=>'required|string|max:50'
        ],
            [
                'max'=>'Maximum length exceeded. Please use a shorter link'
            ]);

       $link=Link::findOrFail($id);

       $link->update([
            'social_id'=>$validate['name'],
            'link'=>$validate['link'],
        ]);

        return redirect('dashboard')
            ->with('status','Social link updated successfully');
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
