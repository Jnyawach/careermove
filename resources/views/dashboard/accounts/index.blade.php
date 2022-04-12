@extends('layouts.main')
@section('title','Profile')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <section  class="p-5">
        @livewire('user-profile',['user'=>$user])
    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection
