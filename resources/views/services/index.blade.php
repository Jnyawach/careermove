@extends('layouts.main')
@section('title','Professional cv writing service in Kenya')
@section('description','Best CV writing service in Kenya')
@section('keywords','cv writing in Kenya, Best CV Writing in Kenya, CV Writing service in Kenya,
Professional CV Writing service, CV Review in Kenya, Jobs in Kenya')
@section('content')
    <section class="resume-header p-2  p-md-5 mb-5">
        <div class="row mt-5 mb-5">
            @foreach($products as $product)
            <div class="col-11 col-sm-6 col-md-6 col-lg-3 p-2 mx-auto">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h6>{{$product->name}}</h6>

                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-center mt-4 mb-3">KES. {{$product->price}}</h5>
                        <p>{{$product->description}}</p>
                        <ul class="list-unstyled p-3 text-start mx-auto">
                            @foreach(explode(':',$product->offers) as $offer)
                            <li><span class="me-2"><i class="fa-solid fa-check"></i></span>{{$offer}}</li>
                            @endforeach
                        </ul>
                        <div class="text-center mt-5">
                            <a href="{{route('services.show',$product->slug)}}" class="btn btn-junior">Select Package</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>



    </section>
    @if ($testimonies->count()>0)
        <section class="mt-5 testimony p-3">
            <h2 class="text-center mt-3">What they are <u>saying</u> about us</h2>
            <div class="row mt-5">
                @foreach ($testimonies as $testimony)
                    <div class="col-12 col-md-4  mx-auto p-2">
                        <div class="test-card p-3">
                            <h5>{{$testimony->first_name}}</h5>
                            <p><span>"</span> {{$testimony->content}}
                                <span>"</span>
                            </p>
                            <div class="mt-5">
                                <img src="{{asset($testimony->getFirstMediaUrl('profile')
                    ?$testimony->getFirstMediaUrl('profile','profile-icon'):'images/user-icon.png')}}" class="img-fluid rounded-circle float-start me-1"
                                     style="width: 60px">

                                <h4 class="fs-5">{{$testimony->first_name}} {{$testimony->last_name}}</h4>
                                <h5 class="fs-5">{{$testimony->title}}</h5>
                            </div>
                        </div>

                    </div>

                @endforeach

            </div>
        </section>

    @endif

    <section class="rating-resume p-3 p-lg-5 mt-5">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto p-3 pt-5">
                <h2 class="text-center numbers">How we are doing</h2>
                <div class="row mt-5">
                    @if ($orders)
                        <div class="col-12 col-sm-6 col-md-4 mx-auto p-2">
                            <div class="written text-center">
                                <img src="{{asset('images/resume.png')}}" class="img-fluid" style="height: 60px">
                                <h2 class="mt-3">{{$orders}}</h2>
                                <p>CVs we have written</p>
                            </div>

                        </div>
                    @endif
                    @if ($jobs)
                        <div class="col-12 col-sm-6 col-md-4 mx-auto p-2">
                            <div class="written text-center">
                                <img src="{{asset('images/jobs-posted.png')}}" class="img-fluid" style="height: 60px">
                                <h2 class="mt-3">{{$jobs}}</h2>
                                <p>Jobs we have Posted</p>
                            </div>

                        </div>
                    @endif



                    @if ($testimonies->count()>0)
                        <div class="col-12 col-sm-6 col-md-4 mx-auto p-2">
                            <div class="written text-center">
                                <img src="{{asset('images/rating.png')}}" class="img-fluid" style="height: 60px">
                                <h2 class="mt-3">{{number_format($rating,1)}}/5 ({{$review->count()}})</h2>
                                <p>Based on your rating</p>
                            </div>

                        </div>
                    @endif


                </div>

            </div>
        </div>

    </section>
@endsection
