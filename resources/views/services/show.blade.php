@extends('layouts.main')
@section('title', $product->name)
@section('description','CV/Resume Writing service')
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 mx-auto">


                <h1 class="fs-3 text-center">Your details</h1>
                <hr>

                <form class="mt-5" action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @honeypot
                    <input type="hidden" name="product" value="{{$product->id}}">
                    <div class="row form-group">
                        <div class="col-12 col-md-6 p-2">
                            <label class="control-label" for="name">Your Name:</label>
                            <input type="text" class="form-control mt-3" id="name" name="name"
                                   placeholder="eg. Jane Doe" required value="{{old('name')}}">
                            @error('name') <span class="error">{{ $message }}</span> @enderror


                        </div>

                        <div class="col-12 col-md-6 p-2">
                            <label class="control-label" for="email">Your Email:</label>
                            <input type="email" class="form-control mt-3" id="email" name="email"
                                   placeholder="eg. janedoe@gmail.com" required value="{{old('email')}}">
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-12 col-md-6 p-2">
                            <label class="control-label" for="cellphone">Your Cellphone:</label>
                            <input type="text" class="form-control mt-2" required name="cellphone" id="cellphone"
                                   placeholder="eg. 0722002100"
                                   value="{{old('cellphone')}}">
                            @error('cellphone') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12 col-md-6 p-2">
                            <label class="control-label">Current CV:</label>
                            <input type="file" class="form-control mt-3" required name="old_cv">
                            @error('old_cv') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="form-group mt-3">
                        <label for="description" class="control-label">Additional Comments(optional)</label>

                        <textarea class="form-control mt-2" id="description"  style="height: 200px"
                                  name="description" required>{{old('description')}}</textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="form-group mt-5 scale p-3">
                        <h6 class="fw-bold mt-3">Professional CV Writing Service ({{$product->name}})</h6>
                        <p class="fw-bold"><span>Package Price:</span> {{$product->price}}</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="addCoverletter" name="coverletter">
                            <label class="form-check-label fw-bold" for="addCoverletter">
                                Add cover letter for KES. 0.00
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Order Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
