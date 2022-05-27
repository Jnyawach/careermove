@extends('layouts.admin')
@section('title',$author->name)
@section('content')
<section class="p-5">
    <div class="row">
        <div class="col-12 col-sm-4 col-md-6">
            <img src="{{asset($author->getFirstMediaUrl('profile')
            ?$author->getFirstMediaUrl('profile','profile-icon'):'images/user-icon.jpg')}}"
            alt="{{$author->name}}" style="height: 100px" class="float-start me-2">
            <h6> {{$author->first_name}} {{$author->last_name}}</h6>
            <p><span>Title:</span>{{$author->title}}</p>
            <p><span>Profession:</span>{{$author->profession}}</p>
        </div>
        <hr>
        <p><span>About:</span>{{$author->about}}</p>
        @can('Edit-model')


        <div class="actions">
            <a href="{{route('authors.edit',$author->id)}}" title="Edit Author" class="btn btn-view m-2 d-inline-block">
                Edit Author
            </a>
            <form action="{{route('authors.destroy',$author->id)}}"
                method="POST" class="d-inline-block">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-secondary m-2">
                  Delet Author
              </button>
          </form>
        </div>
        @endcan

    </div>
</section>
@endsection
