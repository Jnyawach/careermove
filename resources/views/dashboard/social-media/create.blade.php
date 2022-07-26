@extends('layouts.main')
@section('title','Add Social Media Links')
@section('content')
    <section>
        @include('includes.dashboard-menu')
        <section class="dashboard-body p-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-graduation-cap"></i></span>Social Media</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('social-media.store')}}" method="POST">
                        @csrf
                        <div class="form-group row required mt-3">
                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="control-label" for="name">Social Media:</label>
                                <select class="form-select mt-3" id="name" name="name" required>
                                    <option selected value="">Select Social Media</option>
                                    @foreach($social as $id=>$name)
                                    <option value="{{$id}}">{{$name}}</option>
                                    @endforeach


                                </select>
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="control-label" for="link">Link</label>
                                <input type="text" name="link"  id="link" required
                                       class="form-control mt-3" value="{{old('link')}}">
                                @error('link') <span class="error">{{ $message }}</span> @enderror

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
    </section>
@endsection
