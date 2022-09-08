@extends('layouts.auth')
@section('title','Signup Today')
@section('description','Signup discover your next career move')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('styles')
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
@section('content')
    <section class="mt-5 p-2 p-lg-5">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <livewire:wizard />

                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    @livewireScripts
@endsection
