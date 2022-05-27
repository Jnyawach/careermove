@extends('layouts.main')
@section('title','Career insights, advice and reviews')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('content')

        <section class="intro p-2">
            <div class="row mt-5">

                <div class="col-11 col-md-5 mx-auto p-2">

                    <a href="{{route('blog.show',$intro->slug)}}" title="{{$intro->title}}" class="text-decoration-none">
                        <img src="{{asset($intro->getFirstMediaUrl('imageCard')? $intro->getFirstMediaUrl('imageCard','blog-thumb'):'/images/no-image.png' )}}" class="img-fluid curved mb-3"
                        alt="{{$intro->title}}" title="{{$intro->title}}">
                        <h1>{{$intro->title}}</h1>
                        <h6 class="ms-2 fw-bold">{{$intro->author->first_name}} {{$intro->author->last_name}}: {{$intro->created_at->diffForHumans()}}</h6>
                    </a>


                </div>

                <div class="col-11 col-md-6 mx-auto">
                    @foreach($header as $head)
                    <a href="{{route('blog.show',$head->slug)}}" class="text-decoration-none" title="{{$head->title}}">
                        <div class="row p-3">
                            <div class="col-4 col-md-5 col-lg-3">
                                <img src="{{asset($head->getFirstMediaUrl('imageCard')? $head->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved"
                                title="{{$head->title}}" alt="{{$head->title}}">
                            </div>
                            <div class="col-8 col-md-7 col-lg-7">
                                <h2 class="fs-4">{{$head->title}}</h2>
                                <h6 class="ms-2 fw-bold">{{$head->author->first_name}} {{$head->author->last_name}}: {{$head->created_at->diffForHumans()}}</h6>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

        </section>

        <section class=" m-5 pt-3">
            <h1 class="text-uppercase fs-4">Top Picks</h1>
            <hr>
            <div class="row">
                @foreach($you as $post)
                <div class="col-12 col-md-6">
                    <a href="{{route('blog.show',$post->slug)}}" class="text-decoration-none m-1 post-card" title="{{$post->title}}">
                        <div class="row">
                            <div class="col-4 col-md-5 col-lg-5">
                                <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved"
                                title="{{$post->title}}" alt="{{$post->title}}">
                            </div>
                            <div class="col-8 col-md-7 col-lg-7">
                                <h2 class="fs-4">{{$post->title}}</h2>
                                <h6 class="ms-2 fw-bold">{{$post->author->first_name}} {{$post->author->last_name}}: {{$head->created_at->diffForHumans()}}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>

        </section>
        <section class="find-jobs p-5">
            <div class="row p-5">
                <div class="col-11 col-md-8 text-center mx-auto">


                   <a href="{{route('listings.index')}}" class="btn btn-outline-primary text-uppercase">
                    <i class="fa-solid fa-magnifying-glass me-2"></i> Find Your Ideal Job
                </a>

                   <h6 class="mt-4 fs-3">Over 1000 roles to pick from today</h6>

                   <p class="fs-5 mt-2">Never miss this Opportunity
                       <a href="{{route('register')}}">Sign Up here</a>
                   </p>

                </div>

            </div>

        </section>
        <section class=" m-5 pt-3">
            <h1 class="text-uppercase fs-4">Most Trending</h1>
            <hr>
            <div class="row mt-5">
                @foreach($trending as $post)
                <div class="col-11 col-sm-6 col-md-4 col-lg-4 p-3">
                    <a href="{{route('blog.show',$post->slug)}}" title="{{$post->title}}" class="text-decoration-none posts ">
                        <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved mb-2"
                             alt="{{$post->title}}" title="{{$post->title}}">
                             <h6 class="text-uppercase mt-2">{{$post->author->first_name}} {{$post->author->last_name}}: {{$post->created_at->diffForHumans()}}</h6>
                        <h2 class="fs-5">{{$post->title}}</h2>

                    </a>

                </div>
                @endforeach
            </div>
        </section>





@endsection
