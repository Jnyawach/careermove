@extends('layouts.main')
@section('title','Privacy Policy')
@section('title','Explore and discover your next career move')
@section('content')
    <section class="p-3 p-md-5">
        <h6>Revised: {{$policy->updated_at->diffForHUmans()}}</h6>
        <div>
            {!! $policy->text !!}
        </div>
    </section>
@endsection
