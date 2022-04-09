@extends('layouts.admin')
@section('title', 'Messages')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <section class="p-5">
        @livewire('messages')
    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection

