@extends('layouts.admin')
@section('title','Edit User')
@section('content')
    <section>
        <div class="row p-5">
            <div class="col-10 mx-auto">
                <h2>Update User</h2>

                <form method="POST" action="{{route('users.update',$user->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row mt-3">
                        <div class="col-12 col-sm-6 col-md-5">
                            <label class="control-label" for="role"> Role</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="role">
                                <option selected disabled>Select Role</option>
                                @foreach($roles as $unique=>$role)
                                    <option value="{{$unique}}">{{$role}}</option>
                                @endforeach

                            </select>
                            @error('role') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-sm-6 col-md-5 col-lg-5">
                            <label for="email" class="control-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}"
                                   required>
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12 col-sm-6 col-md-5 col-lg-5">
                            <label for="name" class="control-label">First Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}"
                                   required>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12 col-sm-6 col-md-5 col-lg-5">
                            <label for="password" class="control-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="password"
                                   required>
                            @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-sm-6 col-md-5 col-lg-5">
                            <label for="password_confirmation" class="control-label">Confirm Password:</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                                   required>

                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection



