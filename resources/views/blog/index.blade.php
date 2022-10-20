@extends('layouts.main')
@section('title')
Job alerts, Career advice in Kenya-{{date('Y')}}
@endsection
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('styles')
@livewireStyles
<meta property="og:title" content="Job alerts, Career advice in Kenya-{{date('Y')}}" />
<meta property="og:description" content="Latest job vacancies in Kenya. Search and apply for verified job vacancies in top companies hiring across Kenya. Signup  today and  to kickstart your career" />
<meta property="og:image" content="{{asset('images/careermove-logo.png')}}" />

@endsection
@section('content')
@livewire('blog-page')
@endsection
@section('scripts')
@livewireScripts
@endsection
