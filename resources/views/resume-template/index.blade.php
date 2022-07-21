@extends('layouts.main')
@section('title','Resume Templates')
@section('content')
    <section>
        <a href="{{route('resume-template.show',1)}}">Use this template</a>
    </section>
@endsection
