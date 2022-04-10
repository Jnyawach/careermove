@extends('layouts.auth')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-5 mx-auto">
                <livewire:employer-register />
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection
