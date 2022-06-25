@extends('layouts.main')
@section('description','Thank you for ordering Professional CV Writing Service in Kenya')
@section('keywords','cv writing in Kenya, Best CV Writing in Kenya, CV Writing service in Kenya,
Professional CV Writing service, CV Review in Kenya, Jobs in Kenya')
@section('title', 'Thank your order')
@section('content')
<section class="p-5">
   <div class="text-center mt-5">
    <img src="{{asset('images/happy-face.jpg')}}" class="img-fluid" style="width: 100px">
    <h1 class="text-center">Thank You !</h1>
    <h6 class="fs-4">For contracting our CV writing service</h6>
    <p class="fs-4">We wish you success when pursuing your career goals</p>
    <p><span>We have emailed you the order details</span></p>
   </div>
</section>
<section>
    <h2 class="fw-bold text-center">We found this articles interesting</h2>
    <div class="row mt-5">
        @foreach($trending as $post)
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-3" @if ($loop->last) id="last_record" @endif>
            <a href="{{route('blog.show',$post->slug)}}" title="{{$post->title}}" class="text-decoration-none posts ">
                <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved mb-2"
                     alt="{{$post->title}}" title="{{$post->title}}">
                     <h6 class="text-uppercase mt-2">{{$post->author->first_name}} {{$post->author->last_name}}: {{$post->created_at->diffForHumans()}}</h6>
                     <p class="fw-bold fs-6 m-0 p-0 about-post">@if($post->readers>0){{$post->readers}} people are reading this |@endif <i class="fa-solid fa-thumbs-up"></i> {{$post->like}} | <i class="fa-solid fa-thumbs-down"></i> {{$post->dislike}} | <i class="fa-solid fa-message"></i>{{$post->comments()->count()}}</p>
                <h2 class="fs-5">{{$post->title}}</h2>

            </a>

        </div>
        @endforeach
    </div>
</section>
@endsection
