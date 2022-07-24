@extends('layouts.admin')
@section('title', $template->name)
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-6">
                <h1 class="fs-4">{{$template->name}}</h1>
                <p><span>Folder Name:</span> {{$template->folder}}</p>
                <p><span>Status:</span>
                    @if($template->status==1)
                        Active
                    @else
                        Inactive
                    @endif</p>
                <p>{{$template->description}}</p>
                <a href="{{route('cv_templates.edit',$template->id)}}" class="btn btn-primary">Edit Template</a>
            </div>
            <div class="col-6">
                <img src="{{asset($template->getFirstMediaUrl('template')
                                        ?$template->getFirstMediaUrl('template'):'company-icon.jpg')}}"
                     alt="{{$template->name}}" class="img-fluid">
            </div>
        </div>
    </section>
@endsection
