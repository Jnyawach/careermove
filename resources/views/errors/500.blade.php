@extends('errors::minimal')

@section('title', __('Internal Server Error'))
@section('content')
    <section class="p-5">
        <div class="row m-5">
            <div class="col-12 col-md-6 mx-auto text-center pt-5">
                <a href="/" title="Careermove" class="text-decoration-none">
                    <h2 class="nav-logo fw-bolder fs-5">Careermove</h2>
                </a>
                <div class="error-message mt-5">
                    <h2 class="display-1">500</h2>
                    <p class="fs-3">Sorry, unexpected error. Please be
                        patient or try again later</p>
                    <a href="/" class="btn btn-primary" title="Careermove">
                        Go back Home
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
