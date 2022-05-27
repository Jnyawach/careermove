<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\Policy;
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
        })->inRandomOrder()->limit(9)->get();
        return view('welcome', compact('jobs','companies'));
    }

    public function terms(){
        $term=Policy::where('category','Terms')->latest()->first();
        return view('terms', compact('term'));
    }

    public function privacyPolicy(){
        $policy=Policy::where('category','Privacy')->latest()->first();
        return view('privacy-policy', compact('policy'));
    }

    public function about(){
        return view('about');
    }
}
