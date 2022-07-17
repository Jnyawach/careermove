@extends('layouts.main')
@section('title',$company->name)
@section('description'){{$company->name}} is hiring today @endsection


@section('keywords')
Jobs at {{$company->name}}, Work at {{$company->name}}, {{$company->name}} is hiring today, Jobs in kenya, job vacancies in kenya, latest job vacancies in kenya, apply for jobs today
@endsection
@section('styles')
    <meta name="robots" content="max-image-preview:large">
@endsection
@section('content')
    <section class="hiring p-5">
        <div class="row">
           <div class=" col-12 col-md-8 col-lg-6">
                <div class="float-start me-3">
                    <img src="{{asset($company->getFirstMediaUrl('logo')
                             ?$company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}" class="img-fluid img-thumbnail"
                    alt="{{$company->name}}">
                </div>
                <div class="d-inline-block">
                    <h1 class="fs-4">{{$company->name}}</h1>
                    <p class="fs-5"><i class="fa-solid fa-location-crosshairs me-2"></i>{{$company->location->name}},Kenya<br>
                        <i class="fa-solid fa-folder me-2"></i>{{$company->jobs->where('status_id',2)->count()}}
                        Positions
                    </p>

                </div>
            </div>
            <div class="col-md-4 col-lg-6 text-center d-none d-md-block">
                <img src="{{asset('images/find-jobs.png')}}" class="img-fluid" style="height: 100px">


            </div>
        </div>

    </section>

    <!----Professonal CV Adver-->
    @include('includes.pro-cv')


    <section class="p-3">
        <h6 class="fs-5">Open Jobs at {{$company->name}}</h6>
        <div class="row">
            @foreach($company->jobs->where('status_id',2) as $job)
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

    </section>
    @if($companies->count()>0)
        <section class="mt-5">
            <div class="row">
                <div class="col-11 mx-auto">
                    <h6 class="fs-5">Other Companies Hiring</h6>
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
@endsection
