@extends('layouts.main')
@section('title','Saved Resumes')
@section('content')
<section>
    <!--Dashboard Menu-->
    @include('includes.dashboard-menu')
    <section class="resume-body p-5">
        @if($resumes->count()>0)
            <div class="row">
                @foreach($resumes as $resume)
                    <div class="col-12 col-md-4">


                        <div class=" row">
                            <div class="col-12">
                                <div >
                                    <div class=" shadow-sm" >
                                        @include('templates.'.$resume->template->folder.'.index')

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
