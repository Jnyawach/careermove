@extends('layouts.auth')
@section('description','Login to explore and discover your next career move')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('content')
    <section class="mt-5 pt-5 vh-100">
        <div class=" mt-5">
            <div class="row">
                <div class="col-11 col-sm-9 col-md-8 col-lg-6 mx-auto register">
                    <div class="card">
                        <div class="card-body">
                            <div class="">

                                <h6 class="mt-3 text-center">Please Login</h6>
                                <form class="m-sm-5" action="{{route('login')}}" method="POST">
                                    @csrf

                                    <div class="form-group mt-4">
                                        <label class="control-label" for="email">Email:</label>
                                        <input type="email" id="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">
                                        @error('email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mt-4">
                                        <label class="control-label" for="password">Password:</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                        @error('password') <span class="error">{{ $message }}</span> @enderror
                                    </div>


                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">login</button>
                                    </div>
                                    <div class="form-group mt-3">
                                        <p class="d-inline-block m-2">Don't have an account
                                            <a href="{{route('register') }}">Register</a></p>

                                        <p class="d-inline-block m-2">Forgot Password?
                                            <a href="{{route('password.update')}}">Reset</a></p>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
