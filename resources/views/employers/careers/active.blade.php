@extends('layouts.employer')
@section('title','Listings')
@section('content')
    <section class="jobs p-3">
        @if($jobs->count()>0)
            <div class="row">

                @foreach($jobs as $job)
                    <div class=" col-12 col-md-6 p-2">

                        <div class="card job-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <a href="{{route('careers.edit',$job->id)}}" class="btn btn-view">
                                            <i class="fa-solid fa-square-pen"></i> Edit
                                        </a>
                                        <a href="{{route('careers.show',$job->slug)}}" class="btn btn-view">
                                            <i class="fa-solid fa-bookmark"></i> View
                                        </a>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 col-sm-2">
                                        <img src="{{asset($job->company->getFirstMediaUrl('logo')
                                        ?$job->company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}"
                                             alt="{{$job->company->name}}" style="height: 100px">
                                    </div>
                                    <div class="col-9 col-sm-10">

                                        <h2>{{$job->title}}</h2>
                                        <small><i class="fa-regular fa-building"></i> {{$job->company->name}}</small>
                                        <small><i class="fa-solid fa-location-crosshairs"></i>
                                            {{$job->location->name}}</small>

                                        <small><i class="fa-solid fa-briefcase"></i> {{$job->type->name}}</small>
                                        <small><i class="fa-regular fa-clock"></i> {{\Carbon\Carbon::parse
                                    ($job->deadline)->diffForHumans()
                                    }}</small>

                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>

                @endforeach


            </div>

        @else

            <div class="p-5">
                <h5>You have no Active Job Listings</h5>
            </div>
        @endif
    </section>
    <section class="text-center">
        {{$jobs->links('vendor.pagination.custom')}}
    </section>
@endsection

