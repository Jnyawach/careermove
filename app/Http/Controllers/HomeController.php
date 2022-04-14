<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs=Job::active()->latest()->take(4)->get();
        $companies=Company::whereHas('jobs', function (Builder $query){
            $query->active();
        })->limit(9)->get();
        return view('welcome', compact('jobs','companies'));
    }
}
