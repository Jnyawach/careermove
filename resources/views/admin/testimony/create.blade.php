@extends('layouts.admin')
@section('title', 'Add Testimony')
@section('content')
<section class="p-5">
<h2>Add testimony</h2>
<hr>
<form action="{{route('testimony.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-12 col-md-6 col-lg-4">
            <label class="control-label" for="first_name">First Name:</label>
            <input type="text" name="first_name"  id="first_name" required value="{{old('first_name')}}"
           class="form-control mt-3">
           @error('first_name') <span class="error">{{ $message }}</span> @enderror

        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <label class="control-label" for="last_name">Last Name:</label>
            <input type="text" name="last_name"  id="last_name" required value="{{old('last_name')}}"
           class="form-control mt-3">
           @error('last_name') <span class="error">{{ $message }}</span> @enderror

        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <label class="control-label" for="title">Profession:</label>
            <input type="text" name="title"  id="title" required value="{{old('title')}}"
           class="form-control mt-3">
           @error('title') <span class="error">{{ $message }}</span> @enderror

        </div>

    </div>
    <div class="form-group mt-3">
        <label for="content" class="control-label">Testimony</label>
        <div>

        <small>Write your testimonials</small>
        </div>

        <textarea class="form-control mt-2" id="content"
            style="height: 200px" name="content" required >{{old('content')}}</textarea>
            @error('content') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group row mt-3">
        <div class="col-12 col-md-6 col-lg-4">
            <label class="control-label" for="rating">How do you rate the service:</label>
            <select class="form-select mt-3" id="rating" name="rating" required>
                <option selected value="">Select rating level</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>


              </select>
              @error('rating') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <label class="control-label" for="profile">Profile Picture:</label>

            <input type="file" name="profile"  id="profile" required
            class="form-control mt-3">
            @error('profile') <span class="error">{{ $message }}</span> @enderror
        </div>

    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
</section>
@endsection
