@extends('layouts.main')
@section('description','Latest job vacancies in Kenya. Search and apply for verified job vacancies in top companies hiring across Kenya. Signup  today and  to kickstart your career')
@section('title','Companies/organizations hiring in Kenya today')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('styles')
    @livewireStyles
    <meta property="og:title" content="Companies/organizations hiring in Kenya today" />
    <meta property="og:description" content="Latest job vacancies in Kenya. Search and apply for verified job vacancies in top companies hiring across Kenya. Signup  today and  to kickstart your career" />
    <meta property="og:image" content="{{asset('images/careermove-logo.png')}}" />
@endsection
@section('content')
    @livewire('company-hiring')
@endsection
@section('scripts')
    @livewireScripts
@endsection

