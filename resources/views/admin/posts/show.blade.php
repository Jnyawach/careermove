@extends('layouts.admin')
@section('title',$post->title)
@section('styles')
@livewireStyles()
@endsection
@section('content')
    <section>
        <div class="row">
            <div class="col-11 mx-auto">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-link text-decoration-none">Edit</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-link text-decoration-none">
                            Status: @if ($post->status==0)
                                Disabled
                                @else
                                Active
                            @endif
                        </button>
                    </li>


                </ul>
                <hr>
                <h1>{{$post->title}}</h1>
                <div class="hero">
                    <div>
                    <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard'):'/images/no-image.png' )}}"
                         class="img-fluid mb-3">
                    </div>
                    <small>Image credit: {{$post->image_credit}}</small>
                    <p class="fw-bold">By: <span>{{$post->user->name}} {{$post->user->lastname}}</span> on {{$post->created_at->diffForHumans()}}</p>
                    <p class="fw-bold">Tags: <span>{{$post->tags}}</span></p>
                    <div class="summary">
                        <p class="p-0 m-0 fst-italic">{{$post->summary}}</p>
                    </div>
                    <p>{!! $post->content !!}</p>
                    <hr>
                    <h5>Comments</h5>
                    <p> <span>Likes:</span>{{$post->like}} <span>Likes:</span>{{$post->dislike}}</p>
                    @livewire('admin-comment',['post'=>$post])

                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
@livewireScripts()
@endsection
