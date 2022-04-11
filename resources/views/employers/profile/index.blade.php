@extends('layouts.employer')
@section('title','Profile')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <section class="p-5">
        @livewire('employer-profile',['user'=>$user])
    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection
