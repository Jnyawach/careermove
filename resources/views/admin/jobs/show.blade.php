@extends('layouts.admin')
@section('title',$job->title)
@section('content')
    <section class="p-5 job-show">
        <div class="m-3">
            @include('includes.jobs_nav')
        </div>
        @if($job->blocks()->count()>0)
        <div class="tags p-2 mb-3">

            @foreach($job->blocks as $index=> $block)
                    <p class="text-danger p-0 m-0">{{$index+1}}.{{$block->reason}}</p>
                @endforeach

        </div>
        @endif
        <div class="row">
            <div class="col-9">
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
                        @can('Edit-model')
                            <div class="d-inline-flex">
                                <a href="{{route('jobs.edit',$job->id)}}" class="btn btn-view m-2">
                                    <i class="fa-solid fa-square-pen"></i> Edit
                                </a>
                                <form action="{{route('jobs.destroy',$job->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-view m-2 text-danger">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="desc">
                    <p>{!! $job->description !!}</p>
                    <h6>Application Link: <mark>{{$job->link}}</mark> </h6>
                    <div class="tags mt-4 p-3">
                        <p><span>Meta Description:</span>{{$job->meta_description}}</p>
                    </div>
                </div>
            </div>
            <div class="col-3 tags p-3">
                <form method="POST" action="{{route('jobs.update',$job->id)}}"
                      id="status{{$job->id}}">
                    @method('PATCH')
                    @csrf
                    <h6>Set Status to:</h6>
                    @foreach($statuses as $id=>$status)
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio"
                                   name="status_id" value="{{$id}}" required>
                            <label class="form-check-label " for="experience{{$id}}">
                                {{$status}}
                            </label>
                        </div>
                    @endforeach
                    @error('lastName') <span class="error">{{ $message }}</span> @enderror<br>
                    <div class="form-group required m-2 mt-4">
                        <small>
                            Change Status to blocked when:<br>
                            The job listing violates our terms and condition<br>
                            The job is considered a spam<br>

                        </small>
                        <label class="control-label" for="reason">
                            State reason for Blocking:
                        </label>
                        <textarea id="reason" name="reason" class="form-control" rows="6"></textarea>
                        @error('reason') <span class="error">{{ $message }}</span> @enderror<br>


                    </div>

                    <button type="submit" class="btn btn-primary">Save
                        changes</button>

                </form>
            </div>
        </div>



    </section>
@endsection

