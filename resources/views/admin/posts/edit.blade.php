@extends('layouts.admin')
@section('title','Create Post')
@section('styles')
@livewireStyles()
@endsection
@section('content')
<section class="p-5">
    <div class="imgCard">
        <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}">

    </div>
    @livewire('post-edit',['post'=>$post])
</section>
@endsection
@section('scripts')
@livewireScripts()
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
