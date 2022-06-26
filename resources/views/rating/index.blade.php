@extends('layouts.main')
@section('title','Rate our Services')

@section('description','Rate our CV and Resume Writing service')
@section('keywords','cv writing in Kenya, Best CV Writing in Kenya, CV Writing service in Kenya,
Professional CV Writing service, CV Review in Kenya, Jobs in Kenya')
@section('content')
<section class="p-2 p-lg-5">
    <div class="opinion p-3 p-md-5">
        <h1 class="text-center fs-3">Your opinion is super important to us!</h1>
        <div class="row">
            <div class="col-12 col-md-7 mx-auto">
                <form action="{{route('rating.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
                    @csrf
                    @honeypot
                    <div class="form-group row mt-5">
                        <div class="col-12 col-md-5 mx-auto text-center">
                            <label class="rating-label">
                                <input
                                  class="rating rating--nojs"
                                  max="5"
                                  step="1"
                                  type="range"
                                  value="" required name="rating">
                              </label>
                              @error('rating') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="form-group mt-3 required">
                        <label for="content" class="control-label">Say Something;</label>


                        <textarea class="form-control mt-3" id="content"
                            style="height: 200px" name="content" required >{{old('content')}}</textarea>
                            @error('content') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <h6 class="mt-5">How can we call you?</h6>
                    <div class="form-group row mt-3 required">
                        <div class="col-12 col-md-6">
                            <label class="control-label" for="first_name">First Name:</label>
                            <input type="text" name="first_name"  id="first_name" required value="{{old('first_name')}}"
                           class="form-control mt-3">
                           @error('first_name') <span class="error">{{ $message }}</span> @enderror

                        </div>

                        <div class="col-12 col-md-6">
                            <label class="control-label" for="last_name">Last Name:</label>
                            <input type="text" name="last_name"  id="last_name" required value="{{old('last_name')}}"
                           class="form-control mt-3">
                           @error('last_name') <span class="error">{{ $message }}</span> @enderror

                        </div>



                    </div>
                    <div class="form-group row mt-5 required">
                        <div class="col-12 col-md-6">
                            <label class="control-label" for="title">Profession:</label>
                            <input type="text" name="title"  id="title" required value="{{old('title')}}"
                           class="form-control mt-3">
                           @error('title') <span class="error">{{ $message }}</span> @enderror

                        </div>
                        <div class="col-12 col-md-6">
                            <label class="control-label" for="profile">Profile Picture(optional):</label>
                            <div>
                                <small>We will use it for reveiws section</small>
                            </div>

                            <input type="file" name="profile"  id="profile"
                            class="form-control">
                            @error('profile') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary">
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>


</section>
@endsection
@section('scripts')

   <script>
        $(':radio').change(function() {
      console.log('New star rating: ' + this.value);
    });
    </script>
@endsection
