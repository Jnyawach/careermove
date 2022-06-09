@extends('layouts.main')
@section('description','Explore and find companies that are hiring today')
@section('title','Discover the companies and ogranization hiring today')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @livewire('company-hiring')
@endsection
@section('scripts')
    @livewireScripts
@endsection

