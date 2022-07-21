@extends('layouts.main')
@section('title','Resume Templates')
@section('styles')
    @livewireStyles
@endsection
@section('content')
 @livewire('resume-builder',['template'=>$template])
@endsection
@section('scripts')
    @livewireScripts

@endsection
