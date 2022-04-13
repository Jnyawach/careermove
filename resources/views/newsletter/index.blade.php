@extends('layouts.main')
@section('title','Subscribe tou our Jobs Newsletter')
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
