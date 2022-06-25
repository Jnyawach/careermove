@extends('layouts.main')
@section('title','Track you CV Writing Progress')
@section('description','Professiona CV Writing Service')
@section('keywords','Best CV writing service, CV writing in Kenya, Resume writing in Kenya')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <section>
        @livewire('order-tracker')
    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection
