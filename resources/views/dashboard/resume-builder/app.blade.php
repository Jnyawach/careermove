@extends('layouts.main')
@section('title', $template->name)
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @livewire('resume-builder',['template'=>$template,'resume'=>$resume])
@endsection
@section('scripts')
    @livewireScripts
@endsection
