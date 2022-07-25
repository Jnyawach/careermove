@extends('layouts.main')
@section('title','Resume Builder')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @livewire('resume-builder',['template'=>$template,'resume'=>$resume])
@endsection
@section('scripts')
    @livewireScripts

@endsection

