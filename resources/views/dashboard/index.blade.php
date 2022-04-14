@extends('layouts.main')

@section('content')
    <section class="home p-4">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-2 col-md-4 text-end align-self-center d-none d-md-block">
                        <img src="{{asset('images/user-icon.png')}}" class="img-fluid rounded-circle"
                             style="width: 60px">
                    </div>
                    <div class="col-8 align-self-center">
                        <h2 class="fs-2">Welcome back, {{Auth::user()->name}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 align-self-center p-2 text-md-end">
                <a href="{{route('saved.index')}}" class="btn btn-secondary"><i class="fa-regular fa-heart
                me-3"></i>Saved Jobs</a>
            </div>
            <div class="col-sm-4 col-md-3 align-self-center p-2 text-md-start">
                <a href="{{route('accounts.index')}}" class="btn btn-view"><i class="fa-regular fa-user me-3"></i>View
                    Profile</a>
            </div>
        </div>

    </section>
    @if($saves->count()>0)
    <section class="mt-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h2 class="fs-5 text-uppercase">Saved jobs
                    <a href="{{route('saved.index')}}" class="float-end text-decoration-none fs-6"><i class="fa-solid
                    fa-list
                   me-3"></i>View
                        all</a>
                </h2>

                <div class="row mt-5">
                    @foreach($saves as $save)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                            <a href="{{route('listings.show',$save->job->slug)}}" title="{{$save->job->title}}"
                               class="text-decoration-none">
                                <div class="card trending">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <small class="p-0 m-0 fs-6 fw-bold"><span>{{\Carbon\Carbon::parse
                                            ($save->job->deadline)->diffForHumans()
                                            }}</span></small>
                                            </div>
                                            <div class="col-3 text-end">
                                                <button type="button"  class="btn btn-link m-0 p-0">
                                                    <i class="fa-solid fa-heart"></i>
                                                </button>
                                            </div>
                                        </div>


                                        <h6>{{$save->job->company->name}}</h6>
                                        <p class="fs-5 title">{{$save->job->title}}</p>
                                        <div class="addition">
                                            <p><i class="fa-solid fa-money-bill me-2"></i>{{$save->job->range->name}}</p>

                                            <p><i class="fa-solid fa-location-crosshairs
                                        me-2"></i>{{$save->job->location->name}},Kenya</p>
                                            <p><i class="fa-solid fa-briefcase me-2"></i>{{$save->job->type->name}}</p>
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
    @endif
    @if($jobs->count()>0)
    <section class="mt-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h2 class="fs-5 text-uppercase">Recommended for you</h2>
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
                                            ($job->deadline)->diffForHumans()
                                            }}</span></small>
                                            </div>
                                            <div class="col-3 text-end">
                                                @if(Auth::user()->wishlist->where('job_id',$job->id)->count()>0)
                                                    <button type="button"  class="btn btn-link m-0 p-0">
                                                        <i class="fa-solid fa-heart"></i>
                                                    </button>
                                                @else
                                                    <form method="POST" action="{{route('saved.store')}}">
                                                        @csrf
                                                        <input type="hidden" value="{{$job->id}}" name="job_id">
                                                        <button type="submit" title="save job" class="btn btn-link m-0 p-0">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                        </div>


                                        <h6>{{$job->company->name}}</h6>
                                        <p class="fs-5 title">{{$job->title}}</p>
                                        <div class="addition">
                                            <p><i class="fa-solid fa-money-bill me-2"></i>{{$job->range->name}}</p>
                                            <p><i class="fa-solid fa-location-crosshairs
                                        me-2"></i>{{$job->location->name}},Kenya</p>
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
    @endif
    <section class="mt-5 sign p-4">
        <div class="row">
            <div class="col-11 mx-auto">
                <div class="subscribe">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <h1 class="fs-1">Never miss an opportunity...</h1>
                            <p class="fs-4 mt-3">We are here to help you land your next job</p>

                        </div>
                        <div class="col-md-3 mx-auto align-self-center text-end">
                            <a href="{{route('listings.index')}}" title="Sign Up" class="btn btn-primary m-2">
                                View all Jobs<i class="fa-solid fa-angle-right ms-3"></i></a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
    @if($companies->count()>0)
        <section class="mt-5">
            <div class="row">
                <div class="col-11 mx-auto">
                    <h2 class="fs-5 text-uppercase">Companies Hiring Today
                        <a href="{{route('hiring.index')}}" class="float-end text-decoration-none fs-6"><i
                                class="fa-solid fa-list
                   me-3"></i>View
                            all</a>
                    </h2>
                    <div class="row mt-5">
                        @foreach($companies as $company)
                            <div class="col-sm-10 col-md-6 col-lg-3 p-1">
                                <a href="{{route('hiring.show',$company->slug)}}" title="{{$company->name}}"
                                   class="text-decoration-none">
                                    <div class="profile-company">
                                        <div class="card p-2 text-center">
                                            <img src="{{asset($company->getFirstMediaUrl('logo')
                                        ?$company->getFirstMediaUrl('logo'):'company-icon.jpg')}}" class="img-fluid mx-auto"
                                                 alt="{{$company->name}}" style="width: 60px">
                                            <h4 class="fs-6">{{$company->name}}</h4>
                                            <small class="fs-6 text-dark fw-bold">Open Positions {{$company->jobs->count()
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

@endsection

