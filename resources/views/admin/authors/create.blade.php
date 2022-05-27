@extends('layouts.admin')
@section('title','Add Author')
@section('content')
<section class="p-5">
    <form method="POST" action="{{route('authors.store')}}" enctype="multipart/form-data">
        @csrf
        @honeypot
        <div class="form-group row">
            <div class="col-10 col-md-5">
                <label for="profile" class="form-label">Profile Picture(optional)</label>
                <input class="form-control" type="file" id="profile" name="profile">
                @error('profile') <span class="error">{{ $message }}</span> @enderror
                <small>Recommended size of 300px by 300px</small>
            </div>
        </div>
        <div class="form-group row mt-3">
           <div class="col-md-3">
               <label class="control-label" for="first_name">
                   First Name:
               </label>
               <input type="text" class="form-control complete" name="first_name"
                      required value="{{old('first_name')}}">
               @error('first_name') <span class="error">{{ $message }}</span> @enderror
           </div>

           <div class="col-md-3">
            <label class="control-label" for="last_name">
                Last Name:
            </label>
            <input type="text" class="form-control complete" name="last_name"
                   required value="{{old('last_name')}}">
            @error('last_name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label class="control-label" for="profession">
                Profession:
            </label>
            <input type="text" class="form-control complete" name="profession"
                   required value="{{old('profession')}}">
            @error('profession') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label class="control-label" for="title">
                Title:
            </label>
            <input type="text" class="form-control complete" name="title"
                   required value="{{old('title')}}">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>

        </div>
        <div class="form-group mt-3">
            <label for="about">About the Author:</label>
            <textarea class="form-control" required id="about" name="about" rows=6>{{old('about')}}</textarea>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</section>
@endsection
