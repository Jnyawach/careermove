@extends('layouts.employer')
@section('title',$job->title)
@section('content')
    <section class="p-3 p-lg-5 job-show">
        @if($job->blocks()->count()>0)
            <div class="tags p-2 mb-3">

                @foreach($job->blocks as $index=> $block)
                    <p class="text-danger p-0 m-0">{{$index+1}}.{{$block->reason}}</p>
                @endforeach

            </div>
        @endif
        <div class="row">
            <div class="col-4 col-md-2">
                <img src="{{asset($job->company->getFirstMediaUrl('logo')
                                        ?$job->company->getFirstMediaUrl('logo'):'company-icon.jpg')}}"
                     alt="{{$job->company->name}}"  class="img-fluid img-thumbnail">
            </div>
            <div class="col-sm-8 col-md-9 align-self-center">
                <h2 class="fs-4">{{$job->title}}</h2>
                <small><i class="fa-regular fa-building"></i> {{$job->company->name}}</small>
                <small><i class="fa-solid fa-location-crosshairs"></i>
                    {{$job->location->name}}</small>

                <small><i class="fa-solid fa-briefcase"></i> {{$job->type->name}}</small>
                <small><i class="fa-regular fa-clock"></i> {{\Carbon\Carbon::parse
                                    ($job->deadline)->diffForHumans()  }}</small>
                <small><i class="fa-solid fa-bookmark"></i> {{$job->type->name}}</small>
                <small><i class="fa-solid fa-user-tie"></i> {{$job->profession->name}}</small>
                <small><i class="fa-solid fa-industry"></i> {{$job->industry->name}}</small>
                <small><i class="fa-solid fa-money-bill me-2"></i>{{$job->range->name}}</small><br>
                <p>Status: <span>{{$job->status->name}}</span></p>

                <a href="{{route('careers.edit',$job->id)}}" class="btn btn-view mt-2">
                    <i class="fa-solid fa-square-pen"></i> Edit
                </a>
            </div>
        </div>
        <div class="desc">
            <p>{!! $job->description !!}</p>
            <h6>Application Link: {{$job->link}} </h6>
            <div class="tags mt-4 p-3">
                <small>Tags:</small>
                @foreach(explode(",",$job->tags) as $tag)
                    <small><span>{{$tag}}</span></small>
                @endforeach
            </div>
        </div>


    </section>
@endsection
