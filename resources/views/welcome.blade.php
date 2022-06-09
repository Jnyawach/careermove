@extends('layouts.main')
@section('title','Explore and discover latest job Vacancies in Kenya')
@section('description','Discover current jobs in Kenya 2022. Search and apply for verified job vacancies in top companies hiring across Kenya. Signup free today and start growing your career')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('content')
<section class="p-lg-5 p-2 intro">
        <div class="row pt-2 pb-2">
            <div class="col-12 col-md-11 mx-auto">
                <h1 class="">Latest Job Vacancies & Career insights</h1>
                <p class="mt-2 access">Get unlimited access to over a 10000+ jobs</p>
                <a href="{{route('listings.index')}}" class="btn btn-primary m-2 fs-6">
                    Browse jobs <i class="fa-solid fa-angle-right ms-3"></i>
                </a>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h2 class="fs-5 text-uppercase">Trending jobs
                    <a href="{{route('listings.index')}}" class="float-end text-decoration-none fs-6"><i
                            class="fa-solid fa-list
                   me-3"></i>View
                        all</a>
                </h2>
                <hr>

                <div class="row mt-5">
                    @foreach($jobs as $job)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                        <a href="{{route('listings.show',$job->slug)}}" title="{{$job->title}}"
                           class="text-decoration-none">
                            <div class="card trending">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <small class="p-0 m-0 fs-6 fw-bold"><span>{{\Carbon\Carbon::parse
                                            ($job->deadline)->isoFormat('MMM Do YY')
                                            }}</span></small>
                                        </div>
                                        <div class="col-3 text-end">
                                            <form method="POST" action="{{route('saved.store')}}">
                                                @csrf
                                                <input type="hidden" value="{{$job->id}}" name="job_id">
                                                <button type="submit" title="save job" class="btn btn-link m-0 p-0">
                                                    <i class="fa-regular fa-heart"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>


                                    <h6>{{$job->company->name}}</h6>
                                    <p class="fs-5 title">{{$job->title}}</p>
                                    <div class="addition">
                                        <p><i class="fa-solid fa-money-bill me-2"></i>{{$job->range->name}}</p>
                                        <p><i class="fa-solid fa-location-crosshairs
                                        me-2"></i>{{$job->location->name}}, Kenya</p>
                                        <p><i class="fa-solid fa-briefcase me-2"></i>{{$job->type->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </section>
@if($companies->count()>0)
    <section class="mt-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h2 class="fs-5 text-uppercase">Companies Hiring
                    <a href="{{route('hiring.index')}}" class="float-end text-decoration-none fs-6"><i
                            class="fa-solid fa-list
                   me-3"></i>View
                        all</a>
                </h2>
                <hr>
                <div class="row mt-5">
                   @foreach($companies as $company)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                            <a href="{{route('hiring.show',$company->slug)}}" title="{{$company->name}}"
                               class="text-decoration-none">
                                <div class="profile-company">
                                    <div class="card p-2 text-center">
                                        <img src="{{asset($company->getFirstMediaUrl('logo')
                                        ?$company->getFirstMediaUrl('logo'):'company-icon.jpg')}}" class="img-fluid mx-auto"
                                             alt="{{$company->name}}" style="width: 60px">
                                        <h4 class="fs-6">{{$company->name}}</h4>
                                        <small class="fs-6 text-dark fw-bold">Open Positions {{$company->jobs->where('status_id',2)->count()
                                        }}</small>
                                    </div>

                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    @endif
    @include('includes.subscribe')
    <section class="m-3 m-md-5 pt-3">
        <h2 class="text-uppercase fs-4">Trending Insights</h2>
        <hr>
        <div class="row mt-5">
            @foreach($trending as $post)
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-3" @if ($loop->last) id="last_record" @endif>
                <a href="{{route('blog.show',$post->slug)}}" title="{{$post->title}}" class="text-decoration-none posts ">
                    <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved mb-2"
                         alt="{{$post->title}}" title="{{$post->title}}">
                         <h6 class="text-uppercase mt-2">{{$post->author->first_name}} {{$post->author->last_name}}: {{$post->created_at->diffForHumans()}}</h6>
                         <p class="fw-bold fs-6 m-0 p-0 about-post">@if($post->readers>0){{$post->readers}} people are reading this |@endif <i class="fa-solid fa-thumbs-up"></i> {{$post->like}} | <i class="fa-solid fa-thumbs-down"></i> {{$post->dislike}} | <i class="fa-solid fa-message"></i>{{$post->comments()->count()}}</p>
                    <h2 class="fs-5">{{$post->title}}</h2>

                </a>

            </div>
            @endforeach
        </div>


    </section>
@endsection


