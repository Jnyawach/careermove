@extends('layouts.main')
@section('title','Edit References')
@section('content')
<section class="dashboard-body p-3">
    <div class="card">
        <div class="card-header">
            <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-address-card"></i></span> References</h2>


        </div>
        <div class="card-body">
            <form action="{{route('references.update',$reference->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group required row mt-3">
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="name">Full Name:</label>

                        <input type="text" name="name"  id="name" required value="{{$reference->name}}"
                       class="form-control mt-3" placeholder="Jane Doe">
                       @error('name') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="organization">Name of Organization:</label>

                        <input type="text" name="organization"  id="organization" required value="{{$reference->organization}}"
                       class="form-control mt-3" placeholder="Example: Azam Global Inc">
                       @error('organization') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="title">Title:</label>

                        <input type="text" name="title"  id="title" required value="{{$reference->title}}"
                       class="form-control mt-3" placeholder="Example: Marketing director">
                       @error('titl') <span class="error">{{ $message }}</span> @enderror

                    </div>

                </div>
                <div class="form-group required row mt-3">
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="email">Email:</label>

                        <input type="email" name="email"  id="email" required value="{{$reference->email}}"
                       class="form-control mt-3" placeholder="Example: janedoe@gmail.com">
                       @error('email') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="cellphone">Cellphone:</label>

                        <input type="text" name="cellphone"  id="cellphone" required value="{{$reference->email}}"
                       class="form-control mt-3" placeholder="Example: +254 722 002100">
                       @error('cellphone') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="relation">Relation:</label>
                        <select class="form-select mt-3" id="relation" name="relation" required >
                            <option selected value="{{$reference->relation}}">{{$reference->relation}}</option>
                            <option value="Manager">Manager</option>
                            <option value="Colleague">Colleague</option>
                            <option value="Friend">Friend</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Community Leader">Community Leader</option>
                            <option value="Religious Leader">Religious Leader</option>
                            <option value="Other">Other</option>


                          </select>
                          @error('relation') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <hr>
                    <div class="form-group mt-3 text-end">
                        <a href="{{route('dashboard.index')}}" class="btn btn-view">Cancel</a>
                        <button type="submit" class="btn btn-secondary">
                            Save
                        </button>

                    </div>
            </form>
        </div>
    </div>
</section>
@endsection
