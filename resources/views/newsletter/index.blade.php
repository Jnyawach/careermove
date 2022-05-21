@extends('layouts.main')
@section('title','Subscribe to our Jobs Newsletter')
@section('description','Get the latest job direct to your inbox')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <section>
        @livewire('newsletter',
        ['professions'=>$professions])
    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection
