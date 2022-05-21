@extends('layouts.main')
@section('description','Reach out will help you find your next job')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')

@section('title','Message Careermove')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @livewire('contact-form')
@endsection
@section('scripts')
    @livewireScripts
@endsection
