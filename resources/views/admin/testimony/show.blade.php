@extends('layouts.admin')
@section('title', $testimony->first_name)
@section('content')
<section class="p-5">
    <h1 class="fs-4">{{$testimony->first_name}} {{$testimony->last_name}}
        - <span>{{$testimony->rating}}/5</span></h1>
        <hr>
        <div class="testimony">
            <img src="{{asset($testimony->getFirstMediaUrl('profile')
            ?$testimony->getFirstMediaUrl('profile','profile-icon'):'images/user-icon.png')}}"
            class="img-fluid">
            <p><span>Profession:</span>{{$testimony->title}}</p>
            <p><span>Review:</span> {{$testimony->content}}</p>
            <p><span>Review Status:</span>@if ($testimony->status==1)
               Active
               @else
               Inactive
            @endif</p>

        </div>

</section>
@endsection
