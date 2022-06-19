@extends('layouts.main')
@section('title','Edit Education')
@section('styles')
@livewireStyles
@endsection
@section('content')
@livewire('education-edit',['education'=>$education])
@endsection
@section('scripts')
@livewireScripts
@endsection
