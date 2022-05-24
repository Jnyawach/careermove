@extends('layouts.main')
@section('title',$company->name)
@section('description'){{$company->name}} is hiring today @endsection


@section('keywords')
Jobs at {{$company->name}}, Work at {{$company->name}}, {{$company->name}} is hiring today
@endsection
@section('content')
    <section class="hiring p-5">
        <div class="row">
            <div class="col-md-4 text-start align-self-end pt-4">
                <img src="{{asset($company->getFirstMediaUrl('logo')
                 ?$company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}" class="img-fluid img-thumbnail" alt="{{$company->name}}">

            </div>
            <div class="col-md-8 text-center d-none d-md-block">
                <img src="{{asset('images/find-jobs.png')}}" class="img-fluid" style="height: 100px">
            </div>
        </div>

    </section>

    <section class="p-5">
        <h4 class="">{{$company->name}}</h4>
        <p class="fs-5"><i class="fa-solid fa-location-crosshairs me-2"></i>{{$company->location->name}},Kenya<br>
            <i class="fa-solid fa-folder me-2"></i>{{$company->jobs->where('status_id',2)->count()}}
            Positions</p>

    </section>
    <section class="p-2 p-lg-5">
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
        <div>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1649231050054855"
                crossorigin="anonymous"></script>
            <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                data-ad-format="fluid" data-ad-client="ca-pub-1649231050054855" data-ad-slot="7245907301"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
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
