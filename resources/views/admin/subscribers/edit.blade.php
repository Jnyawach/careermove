@extends('layouts.admin')
@section('title','Edit Subscriber')
@section('content')
    <section class="p-5">
        <form action="{{route('subscribers.update',$subscriber->id)}}" method="POST">
          @method('PATCH')
            @csrf
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" name="name" class="form-control" required value="{{$subscriber->name}}">
                </div>
                <div class="col-md-4">
                    <label for="email" class="control-label">Email:</label>
                    <input type="email" name="email" class="form-control" required value="{{$subscriber->email}}">
                </div>

            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>

            </div>

        </form>
    </section>
@endsection
