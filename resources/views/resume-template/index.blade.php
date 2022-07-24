@extends('layouts.main')
@section('title','Resume Templates')
@section('content')
    <section class="p-5 cv-templates">
        <h1 class="text-center fs-4">CV Templates</h1>
        @if($templates->count()>0)
        <div class="mt-5 ">
            <div class="row">
                @foreach($templates as $template)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="resume-image p-4 rounded-3 text-center">
                        <img src="{{asset($template->getFirstMediaUrl('template')
                                        ?$template->getFirstMediaUrl('template','template-icon'):'company-icon.jpg')}}"
                             alt="{{$template->name}}" class="img-fluid curved shadow-sm">



                        <!-- Modal -->
                        <div class="modal fade" id="TemplateModal{{$template->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$template->name}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body preview-body">
                                        <img src="{{asset($template->getFirstMediaUrl('template')
                                        ?$template->getFirstMediaUrl('template'):'company-icon.jpg')}}"
                                             alt="{{$template->name}}" class="img-fluid shadow-sm">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Use this template</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                   <div class="details-prev mt-4 ms-1">
                       <h2 class="fs-5">{{$template->name}}</h2>
                       <p>{{$template->description}}</p>
                       <a href="#" class="btn btn-view m-1">Use this template</a>
                       <button class="btn btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#TemplateModal{{$template->id}}"><i class="fa-regular fa-eye"></i> preview</button>

                   </div>

                </div>
                @endforeach
            </div>
        </div>
        @else
            <h6 class="text-center mt-5">There are no templates now. Please come back later</h6>
        @endif

    </section>
@endsection
