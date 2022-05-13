@extends('layouts.main')
@section('title','Saved Jobs')
@section('content')
<section class="hunt p-2">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('listings.index')}}">All Jobs</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('saved.index')}}">Saved</a>
        </li>

    </ul>
</section>
    <section class="p-3">


        @if($saves->count()>0)
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
                                            <form method="POST" action="{{route('saved.destroy',$save->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                @honeypot
                                                <button type="submit" title="save job" class="btn btn-link m-0 p-0">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>

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
        @else
            <h6 class="fs-5">You have not saved any job</h6>
        @endif

    </section>
    <section class="text-center">
        {{$saves->links('vendor.pagination.custom')}}
    </section>
@endsection
