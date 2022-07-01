@extends('layouts.main')
@section('title')
Discover the latest job alerts in Kenya ({{date('Y')}})
@endsection
@section('description','Latest job vacancies in Kenya. Search and apply for verified job vacancies in top companies hiring across Kenya. Signup  today and  to kickstart your career')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('content')
<section class="intro">

    <div id="carouselCareermove" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselCareermove" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselCareermove" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselCareermove" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-12 col-md-6 align-self-center p-3 mx-auto">
                        <h1>Are you tired of always missing out!</h1>
                        <h2 class="ms-2 mt-3 fs-3">#Let us write your curriculum vitae</h2>
                        <a href="{{route('professional-resume')}}" title="Professonal CV Writing Service"
                            class="btn btn-primary m-3 fs-5">
                            See Details <i class="fa-solid fa-angle-right ms-3"></i>
                        </a>
                    </div>
                    <div class="col-12 col-md-5 align-self-end">
                        <img src="{{asset('images/frustrated-person-2.png')}}" class="img-fluid" alt="Frustrated Person"
                            title="Professional CV Writing Service in Kenya">


                    </div>
                </div>
            </div>

            <div class="carousel-item ">

                <div class="row">
                    <div class="col-12 col-md-6 align-self-center p-3 mx-auto">
                        <h1>Latest Job alerts & Career insights</h1>
                        <h2 class="mt-3 fs-3">Get unlimited access to over a 10000+ jobs</h2>
                        <a href="{{route('listings.index')}}" class="btn btn-primary m-3 fs-5" title="Latest Jobs in Kenya">
                            Browse Jobs <i class="fa-solid fa-angle-right ms-3"></i>
                        </a>
                    </div>
                    <div class="col-12 col-md-5 align-self-end mx-auto">
                        <img src="{{asset('images/jobs-in-kenya.png')}}" class="img-fluid" alt="Frustrated Person"
                            title="Professional CV Writing Service in Kenya">


                    </div>
                </div>

            </div>

            <div class="carousel-item">
                <div class="row">
                    <div class="col-12 col-md-6 align-self-center p-3 mx-auto">
                        <h1>Looking to hire? Post your vacany today. It is free!</h1>
                        <h2 class="ms-2 mt-3 fs-3">Reach thousands of talent with your job listing</h2>
                        <a href="{{route('careers.create')}}" title="Professonal CV Writing Service"
                            class="btn btn-primary m-3 fs-5">
                            See Details <i class="fa-solid fa-angle-right ms-3"></i>
                        </a>
                    </div>
                    <div class="col-12 col-md-5 align-self-end">
                        <img src="{{asset('images/post-jobs.png')}}" class="img-fluid" alt="Post Jobs for free"
                            title="Professional CV Writing Service in Kenya">


                    </div>
                </div>
            </div>


        </div>

</section>

    <section class="mt-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h2 class="section-header">Latest jobs
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
                <h2 class="section-header">Companies Hiring
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
                                        ?$company->getFirstMediaUrl('logo', 'logo-icon'):'company-icon.jpg')}}" class="img-fluid mx-auto"
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
        <h2 class="section-header">Trending Insights</h2>
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
    <section class="conversion p-lg-5 p-3">
        <div class="row">
            <div class="col-md-7 col-lg-6 align-self-center">
                <h2>Are you Struggling to Write a Professional CV?</h2>
                <h5 class="mt-3"><mark>Don't worry we are here to help you achieve</mark></h5>

                <ul class="list-unstyled mt-3">
                    <li><i class="fa-solid fa-star me-2"></i>Credibility</li>
                    <li><i class="fa-solid fa-star me-2"></i>Grab attention</li>
                    <li><i class="fa-solid fa-star me-2"></i>Customize for the job</li>
                </ul>
                <a href="{{route('professional-resume')}}" title="Professonal CV Writing Service"
                            class="btn btn-outline-primary m-3 fs-5">
                            Order Today <i class="fa-solid fa-angle-right ms-3"></i>
                        </a>
            </div>
            <div class="col-md-5">
                <img src="{{asset('images/professiona-cv-writing.png')}}"
                class="img-fluid" alt="Professional CV">
            </div>
        </div>
    </section>
@endsection
@section('scripts')

@endsection


