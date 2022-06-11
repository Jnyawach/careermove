@extends('layouts.main')
@section('title')
Job alerts, Career advice in Kenya-{{date('Y')}}
@endsection
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('styles')
@livewireStyles
@endsection
@section('content')
@livewire('blog-page')
@endsection
@section('scripts')
@livewireScripts
@endsection
