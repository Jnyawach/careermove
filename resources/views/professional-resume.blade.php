@extends('layouts.main')
@section('title','Professional cv writing service in Kenya')
@section('description','Best CV writing service in Kenya')
@section('keywords','cv writing in Kenya, Best CV Writing in Kenya, CV Writing service in Kenya,
Professional CV Writing service, CV Review in Kenya, Jobs in Kenya')
@section('content')
<section class="resume-header">
    <div class="row">
        <div class="col-12 col-md-6 align-self-center p-3 p-lg-5 mx-auto">
            <p class="text-danger">*This page is still under development*</p>
            <h1>Are you tired of always missing out!</h1>
            <h5>#Let us write your curriculum vitae</h5>
            <div class="mx-auto">
            <div class="resume-request p-3 mt-5 shadow">
                <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @honeypot
                    <div class="form-group mt-3">
                        <label class="control-label" for="name">Your Name:</label>
                        <input type="text"  class="form-control mt-2" id="name"name="name"
                        placeholder="eg. Jane Doe" required value="{{old('name')}}">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label class="control-label" for="email">Your Email:</label>
                        <input type="email" class="form-control mt-2" id="email" name="email"
                        placeholder="eg. janedoe@gmail.com" required value="{{old('email')}}">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label class="control-label" for="cellphone">Your Cellphone:</label>
                        <input type="text"  class="form-control mt-2" required name="cellphone" id="cellphone" placeholder="eg.+254 722 002100"
                        value="{{old('cellphone')}}">
                        @error('cellphone') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label class="control-label">Current CV:</label>
                        <input type="file"  class="form-control mt-3" required name="old_cv">
                        @error('old_cv') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary" disabled>WRITE MY CV <i class="fa-solid fa-chevron-right ms-3"></i></button>
                    </div>
                </form>

            </div>
        </div>
        </div>
        <div class="col-12 col-md-6 align-self-end">
           <img src="{{asset('images/frustrated-person.png')}}" class="img-fluid" alt="Frustrated Person"
           title="Professional CV Writing Service in Kenya">


        </div>
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
                        <h2 class="mt-3">{{number_format($testimonies->sum('rating')/$testimonies->count(),1)}}/5 ({{$testimonies->count()}})</h2>
                        <p>Based on your rating</p>
                    </div>

                </div>
                @endif


            </div>

        </div>
    </div>

</section>


@endsection
