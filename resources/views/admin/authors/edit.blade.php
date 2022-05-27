@extends('layouts.admin')
@section('title','Edit Author')
@section('content')
<section class="p-5">
    <img src="{{asset($author->getFirstMediaUrl('profile')
             ?$author->getFirstMediaUrl('profile','profile-icon'):'images/user-icon.jpg')}}"
             alt="{{$author->name}}" style="height: 100px">
    <form method="POST" action="{{route('authors.update',$author->id)}}" enctype="multipart/form-data" class="mt-5">
        @csrf
        @method('PATCH')
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
                      required value="{{$author->first_name}}">
               @error('first_name') <span class="error">{{ $message }}</span> @enderror
           </div>

           <div class="col-md-3">
            <label class="control-label" for="last_name">
                Last Name:
            </label>
            <input type="text" class="form-control complete" name="last_name"
                   required value="{{$author->last_name}}">
            @error('last_name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label class="control-label" for="profession">
                Profession:
            </label>
            <input type="text" class="form-control complete" name="profession"
                   required value="{{$author->profession}}">
            @error('profession') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-3">
            <label class="control-label" for="title">
                Title:
            </label>
            <input type="text" class="form-control complete" name="title"
                   required value="{{$author->title}}">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>

        </div>
        <div class="form-group mt-3">
            <label for="about">About the Author:</label>
            <textarea class="form-control" required id="about" name="about" rows=6>{{$author->about}}</textarea>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Update Author</button>
        </div>
    </form>
</section>
@endsection
