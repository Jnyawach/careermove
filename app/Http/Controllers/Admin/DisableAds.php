<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;

class DisableAds extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //
        $advert=Advert::findOrFail($id);
        $advert->update([
            'status'=>$request->status,
        ]);

        return redirect()->back()
        ->with('status','Advert status Successfully changed');


    }
}
