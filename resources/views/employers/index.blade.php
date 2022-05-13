@extends('layouts.employer')
@section('title','Employers Dashboard')
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>{{$jobs->count()}}</h1>
                        </div>
                        <h5>Total Jobs Listed</h5>
                    </div>

                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-2">
                <a href="{{route('careers-pending')}}" title="See all" class="text-decoration-none">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="card-title">
                                <h1>{{$jobs->where('status_id',1)->count()}}</h1>
                            </div>
                            <h5>Pending Approval</h5>
                        </div>

                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-2">
                <a href="{{route('careers-active')}}" title="See all" class="text-decoration-none">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="card-title">
                                <h1>{{$jobs->where('status_id',2)->count()}}</h1>
                            </div>
                            <h5>Active</h5>
                        </div>

                    </div>
                </a>
            </div>



            <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-2">
                <a href="{{route('careers-blocked')}}" title="See all" class="text-decoration-none">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="card-title">
                                <h1>{{$jobs->where('status_id',4)->count()}}</h1>
                            </div>
                            <h5>Blocked</h5>
                        </div>

                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-2">
                <a href="{{route('careers-inactive')}}" title="See all" class="text-decoration-none">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="card-title">
                                <h1>{{$jobs->where('status_id',5)->count()}}</h1>
                            </div>
                            <h5>Inactive</h5>
                        </div>

                    </div>
                </a>
            </div>
        </div>
        <h6 class="mt-3">Associated Companies/organization</h6>
        <div class="row">
            @foreach(Auth::user()->companies as $company)
                <div class="col-sm-6 col-md-3 p-1">
                    <div class="card text-center p-3">
                        <div class="card-body">
                            <img src="{{asset($company->getFirstMediaUrl('logo')
                                        ?$company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}"
                                 alt="{{$company->name}}" style="height: 100px">
                            <h6 class="text-uppercase">{{$company->name}}</h6>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
