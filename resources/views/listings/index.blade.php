@extends('layouts.main')
@section('title')
Find and apply latest jobs alerts in Kenya {{date('Y')}}
@endsection
@section('description','Explore and discover new jobs')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('styles')
@livewireStyles
@endsection
@section('content')
@livewire('job-listing')
@endsection
@section('scripts')

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@livewire('livewire-ui-modal')
@livewireScripts
@endsection
