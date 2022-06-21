@extends('layouts.admin')
@section('title','Edit Product')
@section('styles')
@livewireStyles
@endsection
@section('content')
@livewire('edit-products',['product'=>$product])
@endsection
@section('scripts')
@livewireScripts
@endsection
