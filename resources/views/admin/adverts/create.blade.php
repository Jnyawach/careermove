@extends('layouts.admin')
@section('title','Create Advertising Programme')
@section('content')
<section class="p-5">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <form action="{{route('adverts.store')}}" method="POST" enctype="multipart/form-data">

            @csrf
            @honeypot
            <div class="form-group mt-3">
                <label class="control-label" for="name">Advertisement Name</label>
                <input class="form-control mt-2" id="name" name="name" required value="{{old('name')}}">
                @error('name') <span class="error">{{ $message }}</span> @enderror
                <small>Provide a Descriptive name for the ads program</small>
            </div>
            <div class="form-group mt-3">
                <label class="control-label" for="link">Affiliate Link</label>
                <input class="form-control mt-2" id="link" name="link" required value="{{old('link')}}">
                @error('link') <span class="error">{{ $message }}</span> @enderror
                <small>Enter Affiliate link fot the ads network</small>
            </div>
            <div class="form-group mt-3">
                <label class="control-label" for="banner">Ads Banner/Image</label>
                <input class="form-control mt-2" type="file" id="banner" name="banner">
                <small>Banner size should be size id 820 px by 180px</small>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">
                    Create
                </button>
            </div>


            </form>

        </div>
    </div>
</section>
@endsection
