@extends('layouts.admin')
@section('title','Create Products')
@section('styles')
@livewireStyles
@endsection
@section('content')
@livewire('order-show',['order'=>$order])
@endsection
@section('scripts')
@livewireScripts
@endsection
