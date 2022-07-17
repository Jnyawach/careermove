<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\Order;
use App\Models\Policy;
use App\Models\Post;
use App\Models\Testimony;
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
        $rating=Testimony::avg('rating');
        $review=Testimony::pluck('rating');
        $companies=Company::whereHas('jobs', function (Builder $query){
            $query->active();
        })->inRandomOrder()->limit(8)->get();
        $trending=Post::where('status',1)->latest()->limit(3)->get();
        return view('welcome', compact('jobs','companies','trending','rating','review'));
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

    public function thank(){
        $trending=Post::where('status',1)->latest()->limit(3)->get();
        return view('thank-you', compact('trending'));
    }

    public function professionaResume(){
        $jobs=Job::count();
        $orders=Order::count();
        $rating=Testimony::avg('rating');
        $review=Testimony::pluck('rating');
        $testimonies=Testimony::inRandomOrder()->take(3)->get();

        return view('professional-resume', compact('jobs','orders','testimonies', 'rating','review'));
    }

    public function confirmation(){
        return view('confirmation');
    }

    public function resume(){
        return view('templates.oxford.index');
    }
}
