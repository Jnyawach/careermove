@extends('layouts.main')
@section('title','Add Work Experience')
@section('styles')
@livewireStyles
@endsection
@section('content')
@livewire('work-edit',['work'=>$work])
@endsection
@section('scripts')
@livewireScripts
@endsection
