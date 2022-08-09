@extends('layouts.main')
@section('title','Saved Resumes')
@section('content')
<section>
    <!--Dashboard Menu-->
    @include('includes.dashboard-menu')
    <section class="resume-body p-5">
        @include('includes.status')
        @if($resumes->count()>0)
            <div class="row">
                @foreach($resumes as $resume)
                    <div class="col-12 col-md-6 col-lg-4">


                        <div class=" row">
                            <div class="col-12 ">
                                <div class="saved-resumes p-3 shadow-sm">
                                    <div class="row">
                                        <div class="col-6 text-center position-relative">
                                            <img src="{{asset($resume->template->getFirstMediaUrl('template')
                                        ?$resume->template->getFirstMediaUrl('template','template-icon'):'company-icon.jpg')}}" class="img-fluid shadow-sm preview-body">

                                            <button type="button" class="btn btn-secondary preview-text">PREVIEW</button>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="fw-bold mt-3" style="font-size: 14px">Updated on {{$resume->updated_at->isoFormat('DD MMM YYYY ')}}</h6>
                                            <div class="mt-4">
                                                <a href="{{route('resume-builder.edit',$resume->id)}}" class="text-decoration-none"><h5 class="fw-bold fs-6"><i class="fa-solid fa-square-pen me-2"></i>Edit</h5></a>
                                                <a href="{{route('resume-download',$resume->id)}}" class="text-decoration-none"><h5 class="fw-bold fs-6"><i class="fa-solid fa-arrow-down me-2"></i>Download PDF</h5></a>
                                                <a href="{{ route('saved-resumes.destroy',$resume->id) }}" class="text-decoration-none" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><h5 class="fw-bold fs-6"><i class="fa-solid fa-trash-can me-2" ></i>Delete</h5></a>

                                                <form id="delete-form" action="{{ route('saved-resumes.destroy',$resume->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')


                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <div class="row p-5">
                <div class="col-12 col-md-7 mx-auto text-center  align-items-center">
                    <h2 class="fs-5">There are no saved CVs/Resumes. <br> Please use the resume/cv creator
                        to design a professional resumes and CVs</h2>
                    <a href="{{route('resume-template.index')}}" title="resume/cv creator" class="btn btn-primary mt-3">Create Resume/CV</a>
                </div>

            </div>
        @endif
    </section>
</section>
@endsection

@section('scripts')

@endsection
