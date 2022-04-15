@extends('layouts.admin')
@section('title','reported Jobs')
@section('content')
    <section class="p-5">
        <h6>{{$job->title}}</h6>
        <hr>
        @foreach($job->reports as $index=> $report)
            <div class="m-3">
                <h6 class="float-start">{{$index+1}}.</h6>
                <h6 class="m-0 p-0">{{$report->reason}}</h6>
                <p class="m-0 p-0">{{$report->additional}}</p>

            </div>
        @endforeach

    </section>
@endsection
